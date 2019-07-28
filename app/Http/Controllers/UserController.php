<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateProfileRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index')->with('usuarios', User::all());
    }

    public function edit()
    {
        return view('users.edit')->with('usuario', auth()->user());
     }

     public function update(UpdateProfileRequest $request)
     {
         $user = auth()->user();

         $user->update([
             'name' => $request->name,
             'about' => $request->about,
         ]);

         session()->flash('success', "Perfil $user->name atualizado com sucesso");
         return redirect()->route('users.index');
     }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();

        session()->flash('success', "Usuário $user->name modificado para admin com sucesso");
        return redirect()->route('usuarios.index');
    }
}
