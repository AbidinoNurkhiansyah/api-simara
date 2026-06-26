<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TempatIbadahController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\TempatIbadah::all());
    }

    public function show($id)
    {
        $tempatIbadah = \App\Models\TempatIbadah::findOrFail($id);
        return response()->json($tempatIbadah);
    }
}
