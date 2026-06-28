<?php

namespace App\Repositories\Eloquent;

use App\Models\TempatIbadah;
use App\Repositories\Contracts\TempatIbadahRepositoryInterface;

class TempatIbadahRepository implements TempatIbadahRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage = 10, ?string $search = null, ?string $type = null)
    {
        $query = TempatIbadah::select('id', 'name', 'type', 'address', 'details', 'map_embed', 'image');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($type && $type !== 'all') {
            $query->where('type', $type);
        }

        $query->orderBy('id', 'desc');

        if ($isAll) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id)
    {
        return TempatIbadah::find($id);
    }

    public function create(array $data)
    {
        return TempatIbadah::create($data);
    }

    public function update(int $id, array $data)
    {
        $tempatIbadah = $this->findById($id);
        if ($tempatIbadah) {
            $tempatIbadah->update($data);
            return $tempatIbadah;
        }
        return null;
    }

    public function delete(int $id)
    {
        $tempatIbadah = $this->findById($id);
        if ($tempatIbadah) {
            return $tempatIbadah->delete();
        }
        return false;
    }
}
