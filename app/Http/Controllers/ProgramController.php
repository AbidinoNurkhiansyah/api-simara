<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProgramService;
use App\Http\Requests\ProgramRequest;

class ProgramController extends Controller
{
    protected $service;

    public function __construct(ProgramService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $isAll = $request->input('all', 'false') === 'true';
        $search = $request->input('search');

        $result = $this->service->getAllPrograms($isAll, $perPage, $search);

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

    public function store(ProgramRequest $request)
    {
        $program = $this->service->createProgram($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $program
        ], 201);
    }

    public function show($id)
    {
        try {
            $program = $this->service->getProgramById($id);
            return response()->json([
                'status' => 'success',
                'data' => $program
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 404);
        }
    }

    public function update(ProgramRequest $request, $id)
    {
        try {
            $program = $this->service->updateProgram($id, $request->validated());
            return response()->json([
                'status' => 'success',
                'data' => $program
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
            $this->service->deleteProgram($id);
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
