<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Terapeuta;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'terms' => 'required'
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }

    public function terapeutaCreate()
    {
        return view('auth.terapeutas.register');
    }

    public function terapeutaStore()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:3',
            'fullname' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:terapeutas,email',
            'especialty' => 'required',
            'register' => 'required',
            'password' => 'required|min:6|max:255',
            'address' => 'required',
            'city' => 'required',
            'cell' => 'required',
            'whatsapp' => 'required',
        ],
    [
            'username.required' => 'O campo NOME, é obrigatório',
            'username.min' => 'O campo NOME, deve ter pelo menos 3 digitos',
            'fullname.required' => 'O campo NOME COMPLETO, é obrigatório',
            'fullname.min' => 'O campo NOME COMPLETO, deve ter pelo menos 6 digitos',
            'email.required' => 'O campo E-MAIL, é obrigatório',
            'email.unique' => 'Consta em nossos registros um cadastro com este E-MAIL', 
            'especialty.required' => 'O campo ESPECIALIDADE, é obrigatório',
            'register.required' => 'O campo REGISTRO, é obrigatório',
            'password.required' => 'O campo SENHA, é obrigatório',
            'password.min' => 'O campo SENHA, deve ter pelo menos 3 digitos',
            'address.required' => 'O campo ENDERECO, é obrigatório',
            'city.required' => 'O campo CIDADE, é obrigatório',
            'cell.required' => 'O campo CELULAR, é obrigatório',
            'whatsapp.required' => 'O campo WHATSAPP, é obrigatório',
    ]);
        $terapeurata = Terapeuta::create($attributes);
        auth()->login($terapeurata);

        return redirect('/dashboard');
    }
}
