<?php

namespace App\Repositories\Eloquent;

use App\Models\Pernikahan;
use App\Repositories\Contracts\PernikahanRepositoryInterface;

class PernikahanRepository implements PernikahanRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage = 10, ?string $search = null, ?string $tahun = null)
    {
        // Hindari SELECT * sesuai dengan agent.md poin 2
        $query = Pernikahan::select('id', 'bulan', 'tahun', 'pernikahan', 'isbat_nikah');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('tahun', 'like', "%{$search}%")
                  ->orWhere('bulan', 'like', "%{$search}%");
            });
        }

        if ($tahun && $tahun !== 'all') {
            $query->where('tahun', $tahun);
        }

        $query->orderBy('tahun', 'desc');

        if ($isAll) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Pernikahan::find($id);
    }

    public function create(array $data)
    {
        return Pernikahan::create($data);
    }

    public function update(int $id, array $data)
    {
        $pernikahan = $this->findById($id);
        if ($pernikahan) {
            $pernikahan->update($data);
            return $pernikahan;
        }
        return null;
    }

    public function delete(int $id)
    {
        $pernikahan = $this->findById($id);
        if ($pernikahan) {
            return $pernikahan->delete();
        }
        return false;
    }
}
