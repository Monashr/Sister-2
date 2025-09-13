<?php

namespace Modules\PostgreSQL\Repositories\Contracts;

use Modules\PostgreSQL\Models\MataKuliah;

interface MataKuliahRepositoryInterface
{
    public function all();
    public function getFilteredSortedAndSearched($request);
    public function find($id);
    public function create(array $data);
    public function update(MataKuliah $mataKuliah, array $data);
    public function delete($id);
    public function getAllMataKuliahNoAll();
}
