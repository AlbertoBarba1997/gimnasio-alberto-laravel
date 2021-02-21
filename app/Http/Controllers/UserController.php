<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('dni', $request->dni)
            ->where('contraseña', $request->contraseña)
            ->where('id_rol', 3)
            ->first();
            
        if (is_object($user)) {
            return response()->json(['message' => 'login', 'usuario' => $user]);
        } else {
            $user = User::where('dni', $request->dni)
                ->where('id_rol', 3)
                ->first();
            if (is_object($user)) {
                return response()->json(['message' => 'Contraseña incorrecta'], 404);
            } else {
                return response()->json(['message' => 'No existe usuario con ese DNI'], 404);
            }
        }
    }
}
