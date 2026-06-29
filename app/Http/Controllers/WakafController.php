<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WakafService;
use App\Http\Requests\StoreWakafRequest;
use App\Http\Requests\UpdateWakafRequest;

class WakafController extends Controller
{
    protected $service;

    public function __construct(WakafService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage        = $request->input('per_page', 10);
        $isAll          = $request->input('all', 'false') === 'true';
        $search         = $request->input('search');
        $jenisProperti  = $request->input('jenis_properti');

        $result = $this->service->getAllWakafs($isAll, $perPage, $search, $jenisProperti);

        if ($isAll) {
            return response()->json([
                'status' => 'success',
                'data'   => $result,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data'   => $result->items(),
            'meta'   => [
                'current_page' => $result->currentPage(),
                'last_page'    => $result->lastPage(),
                'per_page'     => $result->perPage(),
                'total'        => $result->total(),
            ],
        ]);
    }

    public function store(StoreWakafRequest $request)
    {
        $wakaf = $this->service->createWakaf($request->validated());

        return response()->json([
            'status' => 'success',
            'data'   => $wakaf,
        ], 201);
    }

    public function show($id)
    {
        try {
            $wakaf = $this->service->getWakafById($id);
            return response()->json([
                'status' => 'success',
                'data'   => $wakaf,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(UpdateWakafRequest $request, $id)
    {
        try {
            $wakaf = $this->service->updateWakaf($id, $request->validated());
            return response()->json([
                'status' => 'success',
                'data'   => $wakaf,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->service->deleteWakaf($id);
            return response()->json([
                'status'  => 'success',
                'message' => 'Data wakaf berhasil dihapus',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status'  => 'error',
                'message' => $e->getMessage(),
            ], 404);
        }
    }
}
