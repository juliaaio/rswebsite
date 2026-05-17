<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'doctor_schedule_id',
        'tanggal',
        'queue_number',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

     public function schedule()
        {
            return $this->belongsTo(
                DoctorSchedule::class,
                'doctor_schedule_id'
            );
        }
}