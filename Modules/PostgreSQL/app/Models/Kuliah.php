<?php

namespace Modules\PostgreSQL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kuliah extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'kuliah';

    protected $fillable = [
        'mahasiswa_id',
        'dosen_id',
        'mata_kuliah_id',
        'nilai',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosen_id');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
