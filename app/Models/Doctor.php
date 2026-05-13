<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'nama',
        'poli_id',
    ];

    public function poli()
    {
        return $this->belongsTo(Poli::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    public function schedules()
{
    return $this->hasMany(DoctorSchedule::class);
}
}