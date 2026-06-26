<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Program::all());
    }

    public function show($id)
    {
        $program = \App\Models\Program::findOrFail($id);
        return response()->json($program);
    }
}
