<?php

namespace App\Repositories\Contracts;

interface MadrasahRepositoryInterface
{
    public function getAll(bool $isAll, int $perPage, ?string $search = null, ?string $level = null);
    public function findById(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
