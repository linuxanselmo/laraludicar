<?php

namespace App\Http\Controllers;

use App\Models\Terapeuta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display login page.
     *
     * @return Renderable
     */
    public function show()
    {
        return view('auth.login');
    }

    public function terapeutaShow()
    {
        return view('auth.terapeutas.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Por favor verifique suas credenciais de acesso.',   
        ]);
    }

    public function terapeutaLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        Auth::guard('terapeuta')->attempt(['email' => $request->email, 'password' => $request->password]);
            //$request->session()->regenerate();
        
            return redirect()->intended('terapeuta.dashboard');

        dd('passoou por fora');
        return back()->withErrors([
            'email' => 'Por favor verifique suas credenciais de acesso.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
