<?php

namespace App\Services;

use App\Repositories\Contracts\WakafRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class WakafService
{
    protected $repository;

    public function __construct(WakafRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllWakafs(bool $isAll, int $perPage, ?string $search = null, ?string $jenisProperti = null)
    {
        return $this->repository->getAll($isAll, $perPage, $search, $jenisProperti);
    }

    public function getWakafById(int $id)
    {
        $wakaf = $this->repository->findById($id);
        if (!$wakaf) {
            throw new \Exception("Data tidak ditemukan");
        }
        return $wakaf;
    }

    public function createWakaf(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('wakaf', 'public');
            $data['image'] = '/storage/' . $path;
        }

        return $this->repository->create($data);
    }

    public function updateWakaf(int $id, array $data)
    {
        $wakaf = $this->repository->findById($id);
        if (!$wakaf) {
            throw new \Exception("Data tidak ditemukan");
        }

        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Delete old image if stored in local storage
            if ($wakaf->image && str_starts_with($wakaf->image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $wakaf->image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $data['image']->store('wakaf', 'public');
            $data['image'] = '/storage/' . $path;
        } else {
            // No new image uploaded — keep existing
            unset($data['image']);
        }

        return $this->repository->update($id, $data);
    }

    public function deleteWakaf(int $id)
    {
        $wakaf = $this->repository->findById($id);
        if (!$wakaf) {
            throw new \Exception("Data tidak ditemukan");
        }

        // Clean up image from storage
        if ($wakaf->image && str_starts_with($wakaf->image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $wakaf->image);
            Storage::disk('public')->delete($oldPath);
        }

        return $this->repository->delete($id);
    }
}
