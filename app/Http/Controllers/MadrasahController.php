<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MadrasahService;
use App\Http\Requests\StoreMadrasahRequest;
use App\Http\Requests\UpdateMadrasahRequest;

class MadrasahController extends Controller
{
    protected $service;

    public function __construct(MadrasahService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $isAll = $request->input('all', 'false') === 'true';
        $search = $request->input('search');
        $level = $request->input('level');

        $result = $this->service->getAllMadrasahs($isAll, $perPage, $search, $level);

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

    public function store(StoreMadrasahRequest $request)
    {
        $madrasah = $this->service->createMadrasah($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $madrasah
        ], 201);
    }

    public function show($id)
    {
        try {
            $madrasah = $this->service->getMadrasahById($id);
            return response()->json([
                'status' => 'success',
                'data' => $madrasah
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(UpdateMadrasahRequest $request, $id)
    {
        try {
            $madrasah = $this->service->updateMadrasah($id, $request->validated());
            return response()->json([
                'status' => 'success',
                'data' => $madrasah
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
            $this->service->deleteMadrasah($id);
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
