<?php

namespace Modules\PostgreSQL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\PostgreSQL\Http\Request\MataKuliah\CreateMataKuliahRequest;
use Modules\PostgreSQL\Http\Request\MataKuliah\UpdateMataKuliahRequest;
use Modules\PostgreSQL\Models\MataKuliah;
use Modules\PostgreSQL\Services\MataKuliahService;

class MataKuliahController extends Controller
{
    protected $mataKuliahService;

    public function __construct(MataKuliahService $mataKuliahService)
    {
        $this->mataKuliahService = $mataKuliahService;
    }

    public function index(Request $request)
    {
        return Inertia::render('PostgreSQL/MataKuliahIndex', [
            'mataKuliah' => $this->mataKuliahService->getMataKuliahPaginated($request),
            'filters' => $this->mataKuliahService->getAllMataKuliahFilter($request),
        ]);
    }

    public function details(MataKuliah $mataKuliah)
    {
        return Inertia::render('PostgreSQL/MataKuliahDetails', [
            'mataKuliah' => $mataKuliah,
        ]);
    }

    public function addPage()
    {
        return Inertia::render('PostgreSQL/MataKuliahAdd');
    }

    public function create(CreateMataKuliahRequest $request)
    {
        $this->mataKuliahService->createMataKuliah($request->validated());

        return redirect()
            ->route('mysql.mataKuliah.index')
            ->with('success', 'Mata Kuliah Added Successfully.');
    }

    public function editPage(MataKuliah $mataKuliah)
    {
        return Inertia::render('PostgreSQL/MataKuliahEdit', [
            'mataKuliah' => $mataKuliah,
        ]);
    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        $this->mataKuliahService->updateMataKuliah($mataKuliah, $request->validated());

        return redirect()
            ->route('mysql.mataKuliah.index')
            ->with('success', 'Mata Kuliah updated successfully!');
    }

    public function delete(MataKuliah $mataKuliah)
    {
        $this->mataKuliahService->deleteMataKuliah($mataKuliah);

        return redirect()
            ->route('mysql.mataKuliah.index')
            ->with('success', 'Mata Kuliah Deleted Successfully.');
    }
}
