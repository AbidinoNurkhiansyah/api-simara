<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PernikahanService;
use App\Http\Requests\StorePernikahanRequest;
use App\Http\Requests\UpdatePernikahanRequest;

class PernikahanController extends Controller
{
    protected $service;

    public function __construct(PernikahanService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $isAll = $request->input('all', 'false') === 'true';
        $search = $request->input('search');
        $tahun = $request->input('tahun');

        $result = $this->service->getAllPernikahans($isAll, $perPage, $search, $tahun);

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

    public function store(StorePernikahanRequest $request)
    {
        $pernikahan = $this->service->createPernikahan($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $pernikahan
        ], 201);
    }

    public function show($id)
    {
        try {
            $pernikahan = $this->service->getPernikahanById($id);
            return response()->json([
                'status' => 'success',
                'data' => $pernikahan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(UpdatePernikahanRequest $request, $id)
    {
        try {
            $pernikahan = $this->service->updatePernikahan($id, $request->validated());
            return response()->json([
                'status' => 'success',
                'data' => $pernikahan
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
            $this->service->deletePernikahan($id);
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
