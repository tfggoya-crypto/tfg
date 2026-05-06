<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Edificio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $admin = $request->user();

        $edificiosIds = $admin->edificiosAdmin->pluck('id');

        $usuarios = User::whereHas('edificios', function ($q) use ($edificiosIds) {
                $q->whereIn('edificios.id', $edificiosIds);
            })
            ->with('edificios')
            ->get();

        return view('users.index', compact('usuarios'));
    }


    public function create(Request $request)
    {
        $admin = $request->user();

        $edificios = $admin->edificiosAdmin;

        return view('users.create', compact('edificios'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
            'role' => ['required', 'in:empleado,propietario,presidente'],
            'edificios' => ['required', 'array'],
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'nombre' => $validated['nombre'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => $validated['role'],
            ]);

            $user->edificios()->attach($validated['edificios']);
        });

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    public function show(User $user)
    {
        $user->load('edificios');

        return view('users.show', compact('user'));
    }

    public function edit(User $user, Request $request)
    {
        $admin = $request->user();

        $edificios = $admin->edificiosAdmin;

        $user->load('edificios');

        return view('users.edit', compact('user', 'edificios'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'role' => ['required', 'in:empleado,propietario,presidente'],
            'edificios' => ['array'],
        ]);

        DB::transaction(function () use ($validated, $user) {

            $user->update([
                'nombre' => $validated['nombre'],
                'email' => $validated['email'],
                'role' => $validated['role'],
            ]);

            if (isset($validated['edificios'])) {
                $user->edificios()->sync($validated['edificios']);
            }
        });

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuario actualizado correctamente');
    }


    public function destroy(User $user)
    {
        $user->edificios()->detach();
        $user->delete();

        return back()->with('success', 'Usuario eliminado correctamente');
    }
}