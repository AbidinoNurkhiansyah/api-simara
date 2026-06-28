<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TempatIbadahService;
use App\Http\Requests\StoreTempatIbadahRequest;
use App\Http\Requests\UpdateTempatIbadahRequest;

class TempatIbadahController extends Controller
{
    protected $service;

    public function __construct(TempatIbadahService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $isAll = $request->input('all', 'false') === 'true';
        $search = $request->input('search');
        $type = $request->input('type');

        $result = $this->service->getAllTempatIbadahs($isAll, $perPage, $search, $type);

        if ($isAll) {
            return response()->json([
                'status' => 'success',
                'data' => $result
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $result->items(),
            'meta' => [
                'current_page' => $result->currentPage(),
                'last_page' => $result->lastPage(),
                'per_page' => $result->perPage(),
                'total' => $result->total(),
            ]
        ]);
    }

    public function store(StoreTempatIbadahRequest $request)
    {
        $tempatIbadah = $this->service->createTempatIbadah($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $tempatIbadah
        ], 201);
    }

    public function show($id)
    {
        try {
            $tempatIbadah = $this->service->getTempatIbadahById($id);
            return response()->json([
                'status' => 'success',
                'data' => $tempatIbadah
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(UpdateTempatIbadahRequest $request, $id)
    {
        try {
            $tempatIbadah = $this->service->updateTempatIbadah($id, $request->validated());
            return response()->json([
                'status' => 'success',
                'data' => $tempatIbadah
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteTempatIbadah($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
