<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivationEmail;


class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = new User();
    $user->name = $request->name; // Agrega el nombre del usuario
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->activation_token = Str::random(60); // Genera el token de activación
    $user->save();

    Mail::to($user->email)->send(new ActivationEmail($user));

    return response()->json(['message' => 'Registro exitoso. Revisa tu correo para activar la cuenta.']);
}
public function activate($token)
{
    $user = User::where('activation_token', $token)->first();

    if (!$user) {
        return response()->json(['message' => 'Token inválido o expirado.'], 404);
    }

    $user->is_active = true;
    $user->activation_token = null;
    $user->save();

    return response()->json(['message' => 'Cuenta activada exitosamente.']);
}

}
