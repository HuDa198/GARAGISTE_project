<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Repair;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function chart(){
        $totalRepairsPerMonth = Repair::select(DB::raw('MONTH(startDate) as month'), DB::raw('YEAR(startDate) as year'), DB::raw('COUNT(*) as total'))
        ->groupBy(DB::raw('MONTH(startDate)'), DB::raw('YEAR(startDate)'))
        ->get();
    
    $months = [];
    $totalRepairs = [];
    
    foreach ($totalRepairsPerMonth as $totalRepair) {
        $month = Carbon::createFromDate($totalRepair->year, $totalRepair->month)->format('F Y');
        $total = $totalRepair->total;
    
        $months[] = $month;
        $totalRepairs[] = $total;
    }
    $data_repair = [
        'labels' => $months,
        'data' => $totalRepairs,
        'color'=>['rgba(100, 200, 200, 0.8)', 'rgba(255, 150, 150, 0.9)', 'rgba(180, 140, 220, 0.85)',  'rgba(255, 200, 100, 0.8)', 'rgba(50, 120, 200, 0.9)'],
    ];


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
        return view('admins.home', compact('data_invoice','data_repair'));
    }

}