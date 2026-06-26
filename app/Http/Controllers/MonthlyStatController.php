<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthlyStatController extends Controller
{
    public function getStats()
    {
        $stats = \App\Models\MonthlyStat::all();
        // Here you can aggregate data if needed, but for now returning all records
        return response()->json($stats);
    }
}
