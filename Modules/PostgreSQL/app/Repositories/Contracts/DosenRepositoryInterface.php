<?php

namespace Modules\PostgreSQL\Repositories\Contracts;

use Modules\PostgreSQL\Models\Dosen;

interface DosenRepositoryInterface
{
    public function all();
    public function getFilteredSortedAndSearched($request);
    public function find($id);
    public function create(array $data);
    public function update(Dosen $dosen, array $data);
    public function delete($id);
    public function getAllDosenNoAll();
}
