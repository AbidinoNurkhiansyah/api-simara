<?php

namespace App\Repositories\Eloquent;

use App\Models\Madrasah;
use App\Repositories\Contracts\MadrasahRepositoryInterface;

class MadrasahRepository implements MadrasahRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage = 10, ?string $search = null, ?string $level = null)
    {
        $query = Madrasah::select('id', 'name', 'level', 'address', 'status', 'details', 'map_embed', 'image');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($level && $level !== 'all' && $level !== 'Semua') {
            $query->where('level', 'like', "{$level}%"); // Or exact match if level matches exactly
        }

        $query->orderBy('id', 'desc');

        if ($isAll) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Madrasah::find($id);
    }

    public function create(array $data)
    {
        return Madrasah::create($data);
    }

    public function update(int $id, array $data)
    {
        $madrasah = $this->findById($id);
        if ($madrasah) {
            $madrasah->update($data);
            return $madrasah;
        }
        return null;
    }

    public function delete(int $id)
    {
        $madrasah = $this->findById($id);
        if ($madrasah) {
            return $madrasah->delete();
        }
        return false;
    }
}
