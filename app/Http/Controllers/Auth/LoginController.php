<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('authentification.auth.login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    


     public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        // Retrieve the user by email or username
        if ($credentials['username']===null) {
            $user = User::where('email', $credentials['email'])->first();
        } elseif ($credentials['email']===null) {
            $user = User::where('userName', $credentials['username'])->first();
        }

        // Check if the user exists and if the provided password matches the hashed password
     
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return redirect()->route('login.show')
                ->withErrors(trans('auth.failed'));
        };
        // Log in the user                
        Auth::login($user);

        return redirect()->intended(route('chart'))->with('success', "Welcome {$credentials['username']}"); // Redirect to the intended page after login
    } 
    


    /**
     * Handle response after user authenticated
     * 
     * @param Request $request
     * @param Auth $user
     * 
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->intended();
    }
}
