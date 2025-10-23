<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'status'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }
}
