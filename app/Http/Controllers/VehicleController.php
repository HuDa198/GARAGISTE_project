<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class VehicleController extends Controller
{
    public function index()
    {
        // Récupérer tous les véhicules avec les informations des utilisateurs associés
        $vehicles = Vehicle::with('user')->get();


        // Passer les données à la vue
        return view('vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $clients = User::all();
        return view('vehicles.create', compact('clients'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire
        $validatedData = $request->validate([
            'mark' => 'required|string',
            'model' => 'required|string',
            'fuelType' => 'required|string',
            'registration' => 'required|string',
            'user_id' => 'required|integer',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Vous pouvez ajuster ces règles selon vos besoins
        ]);

        // Enregistrer le nouveau véhicule
        $vehicle = new Vehicle();
        $vehicle->mark = $validatedData['mark'];
        $vehicle->model = $validatedData['model'];
        $vehicle->fuelType = $validatedData['fuelType'];
        $vehicle->registration = $validatedData['registration'];
        $vehicle->clientId = $validatedData['user_id'];

       

        if($request->hasFile('photo')) {
            $ext = $request->photo->getClientOriginalExtension();
            $name = Str::random(30) . time() . "." . $ext;
            $name = Storage::putFile('photos', $request->file('photo'));  
            $request->photo->move(public_path('storage/photos'), $name);
            $vehicle->photos = $name;
          }

      
          // Save vehicle
          $vehicle->save();
        // Rediriger l'utilisateur avec un message de succès
        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!');
    }

    public function show($id)
    {
       
        $vehicle = Vehicle::with('user')->findOrFail($id);
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $clients = User::all(); // Assuming User is the model for clients
        return view('vehicles.edit', compact('vehicle', 'clients'));
    }

    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'registration' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $vehicle = Vehicle::findOrFail($id);

        $vehicle->update($request->all());

        $vehicle->registration = $validatedData['registration'];
        $vehicle->clientId = $validatedData['user_id'];

        if($request->hasFile('photo')) {
            $ext = $request->photo->getClientOriginalExtension();
            $name = Str::random(30) . time() . "." . $ext;
            $name = Storage::putFile('photos', $request->file('photo'));  
            $request->photo->move(public_path('storage/photos'), $name);
            $vehicle->photos = $name;
          }

          // Save vehicle
          $vehicle->save();


        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully.');
    }

public function vehicleOwner($vehicleId){
    $vehicle = Vehicle::findOrFail($vehicleId);
    
    // Retrieve the owner (user) associated with the vehicle
    $owner = $vehicle->user;

    // Return the owner data as JSON response
    return response()->json($owner);
}

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
