<?php

namespace App\Repositories\Eloquent;

use App\Models\Program;
use App\Repositories\Contracts\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage = 10, ?string $search = null)
    {
        $query = Program::select('id', 'title', 'tag', 'date', 'desc', 'image');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('desc', 'like', "%{$search}%")
                  ->orWhere('tag', 'like', "%{$search}%");
            });
        }

        $query->orderBy('id', 'desc');

        if ($isAll) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Program::find($id);
    }

    public function create(array $data)
    {
        return Program::create($data);
    }

    public function update(int $id, array $data)
    {
        $program = $this->findById($id);
        if ($program) {
            $program->update($data);
            return $program;
        }
        return null;
    }

    public function delete(int $id)
    {
        $program = $this->findById($id);
        if ($program) {
            return $program->delete();
        }
        return false;
    }
}
