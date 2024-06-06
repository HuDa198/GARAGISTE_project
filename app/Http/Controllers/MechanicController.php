<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class  MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mechanics = User::where('isMechanic', true)
            ->latest()
            ->paginate(10);

        return view('mechanics.index', compact('mechanics'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mechanics.create');
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
            'isAdmin' => false,
            'isClient' => false,
            'isMechanic' => true,
        ]);

        return redirect()->route('mechanics.index')
            ->with('success', 'Mechanic created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $mechanic): View
    {
        return view('mechanics.show', compact('mechanic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $mechanic): View
    {

        return view('mechanics.edit', compact('mechanic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $mechanic): RedirectResponse
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $mechanic->id,
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|string|email|max:255|unique:users,email,' . $mechanic->id,
        ]);

        $mechanic->update([
            'userName' => $validatedData['username'],
            'firstName' => $validatedData['firstname'],
            'lastName' => $validatedData['lastname'],
            'adress' => $validatedData['address'],
            'phoneNumber' => $validatedData['phone_number'],
            'email' => $validatedData['email'],
        ]);

        return redirect()->route('mechanics.index')
            ->with('success', 'mechanic updated successfully');
    }


/*     public function delete(Request $request, $id)
{
  // Récupérer le client à supprimer
  $client = User::find($id);

  // Supprimer le client
  $client->delete();

  // Retourner un message de succès
  return response('ok', 200);
} */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $mechanic): RedirectResponse
    {
        
        $mechanic->delete();

        return redirect()->route('mechanics.index')
            ->with('success', 'Mechanic deleted successfully');
    }
}
