<?php

namespace Modules\PostgreSQL\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Modules\PostgreSQL\Http\Request\Mahasiswa\CreateMahasiswaRequest;
use Modules\PostgreSQL\Http\Request\Mahasiswa\UpdateMahasiswaRequest;
use Modules\PostgreSQL\Models\Mahasiswa;
use Modules\PostgreSQL\Services\MahasiswaService;

class MahasiswaController extends Controller
{
    protected $mahasiswaService;

    public function __construct(MahasiswaService $mahasiswaService)
    {
        $this->mahasiswaService = $mahasiswaService;
    }

    public function index(Request $request)
    {
        return Inertia::render('PostgreSQL/MahasiswaIndex', [
            'mahasiswa' => $this->mahasiswaService->getMahasiswaPaginated($request),
            'filters' => $this->mahasiswaService->getAllMahasiswaFilter($request),
        ]);
    }

    public function details(Mahasiswa $mahasiswa)
    {
        return Inertia::render('PostgreSQL/MahasiswaDetails', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function addPage()
    {
        return Inertia::render('PostgreSQL/MahasiswaAdd');
    }

    public function create(CreateMahasiswaRequest $request)
    {
        $this->mahasiswaService->createMahasiswa($request->validated());

        return redirect()
            ->route('postgresql.mahasiswa.index')
            ->with('success', 'Mahasiswa Added Successfully.');
    }

    public function editPage(Mahasiswa $mahasiswa)
    {
        return Inertia::render('PostgreSQL/MahasiswaEdit', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $this->mahasiswaService->updateMahasiswa($mahasiswa, $request->validated());

        return redirect()
            ->route('postgresql.mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully!');
    }

    public function delete(Mahasiswa $mahasiswa)
    {
        $this->mahasiswaService->deleteMahasiswa($mahasiswa);

        return redirect()
            ->route('postgresql.mahasiswa.index')
            ->with('success', 'Mahasiswa Deleted Successfully.');
    }
}
