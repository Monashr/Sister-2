<?php

namespace Modules\PostgreSQL\Repositories\Contracts;

use Modules\PostgreSQL\Models\Kuliah;

interface KuliahRepositoryInterface
{
    public function all();
    public function getFilteredSortedAndSearched($request);
    public function find($id);
    public function create(array $data);
    public function update(Kuliah $kuliah, array $data);
    public function delete($id);
    
}
