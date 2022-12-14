<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);
        // $authenticate = auth()->attempt($request->only('email', 'password'));
        // if (!$authenticate) {
        //     return back()->with('login_error', "Invalid Login Credentials");
        // }
        switch (Auth::user()->role) {
            case 'user1':
                return redirect()->route('user1');
                break;
            case 'user2':
                return redirect()->route('user2');
                break;
            case 'user3':
                return redirect()->route('user3');
                break;
            case 'user4':
                return redirect()->route('user4');
                break;
            case 'user5':
                return redirect()->route('user5');
                break;
            case 'user6':
                return redirect()->route('user6');
                break;
            default:
                return redirect()->route('login');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
