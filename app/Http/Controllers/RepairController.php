<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Repair;
use App\Models\SparePart;
use App\Models\User;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RepairController extends Controller
{
    public function index(): View
    {
        $repairs = Repair::latest()->paginate(10);
        return view('repairs.index', compact('repairs'));
    }
    public function create(): View
    {
        $spareParts = SparePart::all(); // Assuming you have a SparePart model
        $vehicles = Vehicle::all(); // Assuming you have a Vehicle model
        $clients = User::where('isClient', true)->get();
        $mechanics = User::where('isMechanic', true)->get();
        return view('repairs.create', compact('spareParts', 'clients', 'mechanics', 'vehicles'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'description' => 'required|string',
        'status' => 'required|string',
        'startDate' => 'required|date',
        'endDate' => 'nullable|date',
        'mechanicNotes' => 'nullable|string',
        'clientNotes' => 'nullable|string',
        'repaireCosts' => 'nullable|numeric',
        'vehicleId' => 'required|exists:vehicles,id',
        'ClientId' => 'required|exists:users,id',
        'mechanicId' => 'required|exists:users,id',
        'sparePartId' => 'required|array', // Assuming 'sparePartId' is the input name for spare parts
        'sparePartId.*' => 'exists:spare_parts,id', // Check each spare part ID individually
    ]);
    // Create a new repair instance with validated data
    $repair = new Repair();
    $repair->description = $validatedData['description'];
    $repair->status = $validatedData['status'];
    $repair->startDate = $validatedData['startDate'];
    $repair->endDate = $validatedData['endDate'];
    $repair->mechanicNotes = $validatedData['mechanicNotes'];
    $repair->clientNotes = $validatedData['clientNotes'];
    $repair->repaireCosts = $validatedData['repaireCosts'];

    // Associate the repair with the related vehicle, client, and mechanic
    $repair->vehicle()->associate($validatedData['vehicleId']);
    $repair->client()->associate($validatedData['ClientId']);
    $repair->mechanic()->associate($validatedData['mechanicId']);

    // Save the repair
    $repair->save();

    // Attach spare parts to the repair if provided
    if (isset($validatedData['sparePartId'])) {
        $repair->sparePart()->sync($validatedData['sparePartId']);
    }

    // Redirect to the index page with a success message
    return redirect()->route('repairs.index')
        ->with('success', 'Repair created successfully.');
}
public function show(Repair $repair)
    {
        // Load related models
        $client=User::where('id',$repair->ClientId)->first();
        $mechanic=User::where('id',$repair->mechanicId)->first();
        $vehicle=Vehicle::where('id',$repair->vehicleId)->first();
        $repair->load('vehicle','sparePart');

        // Pass data to the view
        return view('repairs.show', compact('repair', 'mechanic', 'client','vehicle'));
    }
   

    public function destroy(Repair $repair)
    {
        // Detach spare parts
        $repair->spareParts()->detach();

        // Delete related invoices
        Invoice::where('repairId', $repair->id)->delete();

        // Delete the repair
        $repair->delete();

        return redirect()->route('repairs.index')
            ->with('success', 'Repair and associated spare parts and invoices deleted successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Repair  $repair
     * @return \Illuminate\Http\RedirectResponse
     */
  
}
