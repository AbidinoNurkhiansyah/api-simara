<?php

namespace App\Services;

use App\Repositories\Contracts\TempatIbadahRepositoryInterface;
use Illuminate\Support\Facades\Storage;

class TempatIbadahService
{
    protected $repository;

    public function __construct(TempatIbadahRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllTempatIbadahs(bool $isAll, int $perPage, ?string $search = null, ?string $type = null)
    {
        return $this->repository->getAll($isAll, $perPage, $search, $type);
    }

    public function getTempatIbadahById(int $id)
    {
        $tempatIbadah = $this->repository->findById($id);
        if (!$tempatIbadah) {
            throw new \Exception("Data tidak ditemukan");
        }
        return $tempatIbadah;
    }

    public function createTempatIbadah(array $data)
    {
        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            $path = $data['image']->store('tempat-ibadah', 'public');
            $data['image'] = '/storage/' . $path;
        }

        if (isset($data['details']) && is_string($data['details'])) {
            $data['details'] = [$data['details']]; // convert to array for JSON column
        }

        return $this->repository->create($data);
    }

    public function updateTempatIbadah(int $id, array $data)
    {
        $tempatIbadah = $this->repository->findById($id);
        if (!$tempatIbadah) {
            throw new \Exception("Data tidak ditemukan");
        }

        if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Delete old image if exists and not a static asset URL
            if ($tempatIbadah->image && str_starts_with($tempatIbadah->image, '/storage/')) {
                $oldPath = str_replace('/storage/', '', $tempatIbadah->image);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $data['image']->store('tempat-ibadah', 'public');
            $data['image'] = '/storage/' . $path;
        } else {
            // If no new image, don't update the image field
            unset($data['image']);
        }

        if (isset($data['details']) && is_string($data['details'])) {
            $data['details'] = [$data['details']]; // convert to array for JSON column
        }

        return $this->repository->update($id, $data);
    }

    public function deleteTempatIbadah(int $id)
    {
        $tempatIbadah = $this->repository->findById($id);
        if (!$tempatIbadah) {
            throw new \Exception("Data tidak ditemukan");
        }

        if ($tempatIbadah->image && str_starts_with($tempatIbadah->image, '/storage/')) {
            $oldPath = str_replace('/storage/', '', $tempatIbadah->image);
            Storage::disk('public')->delete($oldPath);
        }

        return $this->repository->delete($id);
    }
}
