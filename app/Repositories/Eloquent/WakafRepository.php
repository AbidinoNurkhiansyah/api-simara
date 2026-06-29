<?php

namespace App\Repositories\Eloquent;

use App\Models\Wakaf;
use App\Repositories\Contracts\WakafRepositoryInterface;

class WakafRepository implements WakafRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage = 10, ?string $search = null, ?string $jenisProperti = null)
    {
        $query = Wakaf::select('id', 'name', 'jenis_properti', 'luas', 'nadzir', 'address', 'map_embed', 'image');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('nadzir', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%");
            });
        }

        if ($jenisProperti && $jenisProperti !== 'all') {
            $query->where('jenis_properti', $jenisProperti);
        }

        $query->orderBy('id', 'desc');

        if ($isAll) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Wakaf::find($id);
    }

    public function create(array $data)
    {
        return Wakaf::create($data);
    }

    public function update(int $id, array $data)
    {
        $wakaf = $this->findById($id);
        if ($wakaf) {
            $wakaf->update($data);
            return $wakaf;
        }
        return null;
    }

    public function delete(int $id)
    {
        $wakaf = $this->findById($id);
        if ($wakaf) {
            return $wakaf->delete();
        }
        return false;
    }
}
