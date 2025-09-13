<?php

namespace Modules\PostgreSQL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\PostgreSQL\Http\Request\Dosen\CreateDosenRequest;
use Modules\PostgreSQL\Http\Request\Dosen\UpdateDosenRequest;
use Modules\PostgreSQL\Models\Dosen;
use Modules\PostgreSQL\Services\DosenService;

class DosenController extends Controller
{
    protected $dosenService;

    public function __construct(DosenService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function index(Request $request)
    {
        return Inertia::render('PostgreSQL/DosenIndex', [
            'dosen' => $this->dosenService->getDosenPaginated($request),
            'filters' => $this->dosenService->getAllDosenFilter($request),
        ]);
    }

    public function details(Dosen $dosen)
    {
        return Inertia::render('PostgreSQL/DosenDetails', [
            'dosen' => $dosen,
        ]);
    }

    public function addPage()
    {
        return Inertia::render('PostgreSQL/DosenAdd');
    }

    public function create(CreateDosenRequest $request)
    {
        $this->dosenService->createDosen($request->validated());

        return redirect()
            ->route('postgresql.dosen.index')
            ->with('success', 'Dosen Added Successfully.');
    }

    public function editPage(Dosen $dosen)
    {
        return Inertia::render('PostgreSQL/DosenEdit', [
            'dosen' => $dosen,
        ]);
    }

    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $this->dosenService->updateDosen($dosen, $request->validated());

        return redirect()
            ->route('postgresql.dosen.index')
            ->with('success', 'Dosen updated successfully!');
    }

    public function delete(Dosen $dosen)
    {
        $this->dosenService->deleteDosen($dosen);

        return redirect()
            ->route('postgresql.dosen.index')
            ->with('success', 'Dosen Deleted Successfully.');
    }
}
