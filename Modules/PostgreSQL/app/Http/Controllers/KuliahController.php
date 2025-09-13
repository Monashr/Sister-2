<?php

namespace Modules\PostgreSQL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\PostgreSQL\Http\Request\Kuliah\CreateKuliahRequest;
use Modules\PostgreSQL\Http\Request\Kuliah\UpdateKuliahRequest;
use Modules\PostgreSQL\Models\Kuliah;
use Modules\PostgreSQL\Services\KuliahService;

class KuliahController extends Controller
{
    protected $kuliahService;

    public function __construct(KuliahService $kuliahService)
    {
        $this->kuliahService = $kuliahService;
    }

    public function index(Request $request)
    {
        return Inertia::render('PostgreSQL/KuliahIndex', [
            'kuliah' => $this->kuliahService->getKuliahPaginated($request),
            'filters' => $this->kuliahService->getAllKuliahFilter($request),
        ]);
    }

    public function details($id)
    {
        return Inertia::render('PostgreSQL/KuliahDetails', [
            'kuliah' => $this->kuliahService->getKuliah($id),
        ]);
    }

    public function addPage()
    {
        return Inertia::render('PostgreSQL/KuliahAdd', [
            'options' => $this->kuliahService->getAllOptions(),
        ]);
    }

    public function create(CreateKuliahRequest $request)
    {
        $this->kuliahService->createKuliah($request->validated());

        return redirect()
            ->route('postgresql.kuliah.index')
            ->with('success', 'Kuliah Added Successfully.');
    }

    public function editPage(Kuliah $kuliah)
    {
        return Inertia::render('PostgreSQL/KuliahEdit', [
            'kuliah' => $this->kuliahService->getKuliah($kuliah->id),
            'options' => $this->kuliahService->getAllOptions(),
        ]);
    }

    public function update(UpdateKuliahRequest $request, Kuliah $kuliah)
    {
        $this->kuliahService->updateKuliah($kuliah, $request->validated());

        return redirect()
            ->route('postgresql.kuliah.index')
            ->with('success', 'Kuliah updated successfully!');
    }

    public function delete(Kuliah $kuliah)
    {
        $this->kuliahService->deleteKuliah($kuliah);

        return redirect()
            ->route('postgresql.kuliah.index')
            ->with('success', 'Kuliah Deleted Successfully.');
    }
}
