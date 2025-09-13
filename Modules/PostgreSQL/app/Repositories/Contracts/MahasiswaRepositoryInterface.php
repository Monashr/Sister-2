<?php

namespace Modules\PostgreSQL\Repositories\Contracts;

use Modules\PostgreSQL\Models\Mahasiswa;

interface MahasiswaRepositoryInterface
{
    public function all();
    public function getFilteredSortedAndSearched($request);
    public function find($id);
    public function create(array $data);
    public function update(Mahasiswa $mahasiswa, array $data);
    public function delete($id);
    public function getAllMahasiswaNoAll();
}
