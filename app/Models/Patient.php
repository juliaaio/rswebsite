<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'nik',
        'no_rm',
        'nama',
        'tanggal_lahir',
        'gender',
        'alamat',
        'no_hp',
    ];

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}