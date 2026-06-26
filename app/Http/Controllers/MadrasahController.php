<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MadrasahController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Madrasah::all());
    }

    public function show($id)
    {
        $madrasah = \App\Models\Madrasah::findOrFail($id);
        return response()->json($madrasah);
    }
}
