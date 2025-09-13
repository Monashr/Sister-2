<?php

namespace Modules\PostgreSQL\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dosen extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'dosen';

    protected $fillable = [
        'nip',
        'nama',
        'alamat',
    ];

    public function kuliah()
    {
        return $this->hasMany(Kuliah::class, 'dosen_id');
    }
}
