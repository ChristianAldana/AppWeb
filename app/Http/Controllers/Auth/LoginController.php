<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Asegúrate de importar la clase Request

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/welcome'; // Puedes dejar esto como una ruta por defecto

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Get the post login / authentication redirect path.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function authenticated(Request $request, $user)
    {
        // Redirige según el rol del usuario
        if ($user->role_id == 1) { // Admin
            return redirect()->route('dashboard.admin'); // Asegúrate de que esta ruta existe
        } elseif ($user->role_id == 2) { // Teacher
            return redirect()->route('dashboard.teacher'); // Asegúrate de que esta ruta existe
        } elseif ($user->role_id == 3) { // Student
            return redirect()->route('dashboard.student'); // Asegúrate de que esta ruta existe
        }

        // Redirigir a la página de inicio por defecto si no coincide con los roles
        return redirect('/welcome');
    }
}
