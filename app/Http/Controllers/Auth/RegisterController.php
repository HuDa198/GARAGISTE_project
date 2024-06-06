<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('authentification.auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        // Get validated data from the request
        $validatedData = $request->validated();
    
        // Perform additional logic or modifications
        $userData = [
            'userName' => $validatedData['username'],
            'firstName' => $validatedData['firstname'],
            'lastName' => $validatedData['lastname'],
            'adress' => $validatedData['address'],
            'phoneNumber' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'isAdmin' => $validatedData['user_type'] === 'admin',
            'isClient' => $validatedData['user_type'] === 'client',
            'isMechanic' => $validatedData['user_type'] === 'mechanic',
        ];
    
        // Create a new user with the modified data
        $user = User::create($userData);
    
        // Log in the newly created user
        auth()->login($user);
    
        // Redirect with success message
        return redirect('login')->with('success', "Account successfully registered.");
    }
    
}
