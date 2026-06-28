<?php

namespace App\Services;

use App\Repositories\Contracts\PernikahanRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PernikahanService
{
    protected $repository;

    public function __construct(PernikahanRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllPernikahans(bool $isAll, int $perPage, ?string $search = null, ?string $tahun = null)
    {
        return $this->repository->getAll($isAll, $perPage, $search, $tahun);
    }

    public function getPernikahanById(int $id)
    {
        $pernikahan = $this->repository->findById($id);
        
        if (!$pernikahan) {
            throw new ModelNotFoundException("Data Pernikahan tidak ditemukan.");
        }

        return $pernikahan;
    }

    public function createPernikahan(array $data)
    {
        return $this->repository->create($data);
    }

    public function updatePernikahan(int $id, array $data)
    {
        $pernikahan = $this->repository->update($id, $data);
        
        if (!$pernikahan) {
            throw new ModelNotFoundException("Data Pernikahan tidak ditemukan.");
        }

        return $pernikahan;
    }

    public function deletePernikahan(int $id)
    {
        $deleted = $this->repository->delete($id);
        
        if (!$deleted) {
            throw new ModelNotFoundException("Data Pernikahan tidak ditemukan.");
        }

        return true;
    }
}
