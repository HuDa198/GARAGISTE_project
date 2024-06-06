<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\SparePart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class SparePartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $spareParts = SparePart::latest()->paginate(10);

        return view('spareParts.index', compact('spareParts'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('spareParts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'partName' => 'required|string|max:255',
            'partReference' => 'required|string|max:255',
            'supplier' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
      SparePart::create($validatedData);
    
        return redirect()->route('spareparts.index')
            ->with('success', 'Spare part created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sparePart = SparePart::where('id', $id)->firstOrFail();
        return view('sparePartes.show', compact('sparePart'));
    }

    public function edit( $id): View
    {
        $sparePart = SparePart::where('id', $id)->firstOrFail();
        return view('sparePartes.edit', compact('sparePart'));
    }

    public function update(Request $request, $id)
    {
        $sparePart = SparePart::where('id', $id)->firstOrFail();
        $sparePart->update($request->all());

        return redirect()->route('spareparts.index')
                         ->with('success', 'Spare part updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id): RedirectResponse
    {
        SparePart::where('id', $id)->delete();

        return redirect()->route('spareparts.index')
            ->with('success', 'Spare part deleted successfully');
    }
    
}
