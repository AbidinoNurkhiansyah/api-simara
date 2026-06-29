<?php

namespace App\Services;

use App\Repositories\Contracts\ProgramRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class ProgramService
{
    protected $repository;

    public function __construct(ProgramRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPrograms(bool $isAll, int $perPage, ?string $search = null)
    {
        return $this->repository->getAll($isAll, $perPage, $search);
    }

    public function getProgramById(int $id)
    {
        $program = $this->repository->findById($id);
        if (!$program) {
            throw new \Exception("Data tidak ditemukan");
        }
        return $program;
    }

    public function createProgram(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('program', 'public');
            $data['image'] = '/storage/' . $path;
        }

        return $this->repository->create($data);
    }

    public function updateProgram(int $id, array $data)
    {
        $program = $this->repository->findById($id);
        if (!$program) {
            throw new \Exception("Data tidak ditemukan");
        }

        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Delete old image if exists and not a static asset URL
            if ($program->image && str_starts_with($program->image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $program->image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $data['image']->store('program', 'public');
            $data['image'] = '/storage/' . $path;
        } else {
            // If no new image, don't update the image field
            unset($data['image']);
        }

        return $this->repository->update($id, $data);
    }

    public function deleteProgram(int $id)
    {
        $program = $this->repository->findById($id);
        if (!$program) {
            throw new \Exception("Data tidak ditemukan");
        }

        if ($program->image && str_starts_with($program->image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $program->image);
            Storage::disk('public')->delete($oldPath);
        }

        return $this->repository->delete($id);
    }
}
