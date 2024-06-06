<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Repair;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function printInvoice($repairId)
    {
        // Retrieve the repair instance with its related data
        $repair = Repair::with(['vehicle', 'client', 'mechanic', 'sparePart'])->findOrFail($repairId);
        // Get the related vehicle, client, and mechanic information
        $vehicle = $repair->vehicle;
        $client = User::where('id', $repair->ClientId)->first();
        $mechanic = User::where('id', $repair->mechanicId)->first();

        // Calculate the total amount including repair costs and spare parts prices
        $totalSparePartsPrice = $repair->sparePart->sum('price');
        $totalAmount = $repair->repaireCosts + $totalSparePartsPrice;

        // Create the invoice record
        $invoice = new Invoice();
        $invoice->repairId = $repair->id;
        $invoice->addCharges = 1;
        $invoice->totalAmount = $totalAmount;
        $invoice->save();


        $pdf = PDF::loadView('invoices.invoice', compact('invoice', 'repair', 'vehicle', 'client', 'mechanic'));
        return $pdf->download('invoice.pdf');
    }


    public function chart()
    {
        $totalAmountsPerMonth = Invoice::select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('SUM(totalAmount) as total'))
            ->groupBy(DB::raw('MONTH(created_at)'), DB::raw('YEAR(created_at)'))
            ->get();

        $months = [];
        $totals = [];

        foreach ($totalAmountsPerMonth as $totalAmount) {
            $month = Carbon::createFromDate($totalAmount->year, $totalAmount->month)->format('F Y');
            $total = $totalAmount->total;

            $months[] = $month;
            $totals[] = $total;
        }
        
        $data_invoice = [
            'labels' => $months,
            'data' => $totals,
            'color'=>['rgba(100, 200, 200, 0.8)', 'rgba(255, 150, 150, 0.9)', 'rgba(180, 140, 220, 0.85)',  'rgba(255, 200, 100, 0.8)', 'rgba(50, 120, 200, 0.9)'],
        ];
        return view('admins.home', compact('data_invoice'));
    }
}
