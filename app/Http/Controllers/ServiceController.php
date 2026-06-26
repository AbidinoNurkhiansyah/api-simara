<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return response()->json(\App\Models\Service::all());
    }

    public function show($id)
    {
        $service = \App\Models\Service::findOrFail($id);
        return response()->json($service);
    }
}
