<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Muestra el formulario para editar los datos
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.editUser',compact('user'));
    }

    /**
     * Permite actualizar los datos
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($request->input('password'));
        $user = User::find($id);
        $user->update($validatedData);
        return redirect('/events')->with('success_msg', 'Datos actualizados');
    }

}
