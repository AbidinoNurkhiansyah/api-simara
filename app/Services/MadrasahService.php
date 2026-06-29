<?php

namespace App\Services;

use App\Repositories\Contracts\MadrasahRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class MadrasahService
{
    protected $repository;

    public function __construct(MadrasahRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllMadrasahs(bool $isAll = false, int $perPage = 10, ?string $search = null, ?string $level = null)
    {
        return $this->repository->getAll($isAll, $perPage, $search, $level);
    }

    public function getMadrasahById(int $id)
    {
        $madrasah = $this->repository->findById($id);
        if (!$madrasah) {
            throw new \Exception('Madrasah not found');
        }
        return $madrasah;
    }

    public function createMadrasah(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('madrasahs', 'public');
            $data['image'] = '/storage/' . $path;
        }

        if (isset($data['details']) && is_string($data['details'])) {
            $data['details'] = [$data['details']]; // Simple conversion, assuming frontend sends string
        }

        return $this->repository->create($data);
    }

    public function updateMadrasah(int $id, array $data)
    {
        $madrasah = $this->getMadrasahById($id);

        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Delete old image
            if ($madrasah->image) {
                $oldPath = str_replace('/storage/', '', $madrasah->image);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }

            $path = $data['image']->store('madrasahs', 'public');
            $data['image'] = '/storage/' . $path;
        } else {
            unset($data['image']); // Don't update image if not provided
        }

        if (isset($data['details']) && is_string($data['details'])) {
            $data['details'] = [$data['details']];
        }

        return $this->repository->update($id, $data);
    }

    public function deleteMadrasah(int $id)
    {
        $madrasah = $this->getMadrasahById($id);

        if ($madrasah->image) {
            $oldPath = str_replace('/storage/', '', $madrasah->image);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        return $this->repository->delete($id);
    }
}
