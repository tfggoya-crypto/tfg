<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Edificio;

class UserController extends Controller
{
    // ========================
    // 📄 LISTAR USUARIOS
    // ========================
    public function index()
    {
        $usuarios = User::with('edificio')->get();

        return view('admin.usuarios.index', compact('usuarios'));
    }

    // ========================
    // 💾 CREAR USUARIO
    // ========================
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'rol' => 'required|in:administrador,propietario,empleado',
            'subrol' => 'nullable|string',
            'edificio_id' => 'nullable|exists:edificios,id',
        ]);

        User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'rol' => $request->rol,
            'subrol' => $request->subrol,
            'edificio_id' => $request->edificio_id,
        ]);

        return redirect('/admin/usuarios')->with('success', 'Usuario creado correctamente');
    }

    // ========================
    // ✏ ACTUALIZAR USUARIO
    // ========================
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'rol' => 'required|in:administrador,propietario,empleado',
            'subrol' => 'nullable|string',
            'edificio_id' => 'nullable|exists:edificios,id',
        ]);

        $usuario->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'rol' => $request->rol,
            'subrol' => $request->subrol,
            'edificio_id' => $request->edificio_id,
        ]);

        return redirect('/admin/usuarios')->with('success', 'Usuario actualizado');
    }

    // ========================
    // 🗑 ELIMINAR USUARIO
    // ========================
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect('/admin/usuarios')->with('success', 'Usuario eliminado');
    }
}