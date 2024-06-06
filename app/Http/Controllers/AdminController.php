<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class  AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $admins = User::where('isAdmin', true)
            ->latest()
            ->paginate(10);

        return view('admins.index', compact('admins'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'userName' => $validatedData['username'],
            'firstName' => $validatedData['firstname'],
            'lastName' => $validatedData['lastname'],
            'adress' => $validatedData['address'],
            'phoneNumber' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'isAdmin' => true,
            'isClient' => false,
            'isMechanic' => false,
        ]);

        return redirect()->route('admins.index')
            ->with('success', 'Admin created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin): View
    {
        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $admin): View
    {

        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $admin): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        ]);

        $admin->update([
            'userName' => $validatedData['username'],
            'firstName' => $validatedData['firstname'],
            'lastName' => $validatedData['lastname'],
            'adress' => $validatedData['address'],
            'phoneNumber' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('admins.index')
            ->with('success', 'Admin updated successfully');
    }


/*     public function delete(Request $request, $id)
{
  // Récupérer le client à supprimer
  $client = User::find($id);

  // Supprimer le client
  $client->delete();

  // Retourner un message de succès
  return response('ok', 200);
}
 */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $admin): RedirectResponse
    {
        
        $admin->delete();

        return redirect()->route('admins.index')
            ->with('success', 'Admin deleted successfully');
    }
}
