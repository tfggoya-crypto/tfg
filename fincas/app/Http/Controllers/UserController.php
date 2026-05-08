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
            'role' => ['required', 'in:empleado,propietario'],
            'subrole' => ['nullable', 'in:vecino,presidente,conserje,jardinero,limpieza,otros'],
            'edificio_id' => ['required', 'exists:edificios,id'],
        ]);

        DB::transaction(function () use ($validated) {

        $username = $this->generarUsername($validated['nombre']);

            User::create([
                'nombre' => $validated['nombre'],
                'email' => $validated['email'],
                'username' => $username,
                'password' => Hash::make($username),
                'role' => $validated['role'],
                'subrole' => $validated['subrole'] ?? null,
                'edificio_id' => $validated['edificio_id'],
            ]);
        });

        return back()->with(
            'success',
            'Usuario creado correctamente'
        );
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
        $user->delete();

        return back()->with('success', 'Usuario eliminado correctamente');
    }

    private function generarUsername($nombre)
    {
        $base = strtolower(trim($nombre));

        $base = preg_replace('/\s+/', '.', $base);

        $base = iconv('UTF-8', 'ASCII//TRANSLIT', $base);
        $base = preg_replace('/[^a-z0-9\.]/', '', $base);

        $username = $base;

        $contador = 1;

        while (User::where('username', $username)->exists()) {

            $username = $base . $contador;

            $contador++;
        }

        return $username;
    }
}