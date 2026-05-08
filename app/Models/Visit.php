<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'patient_id',
        'tanggal',
        'poli',
        'dokter',
        'queue_number',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}