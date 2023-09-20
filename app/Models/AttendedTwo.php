<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendedTwo extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attended_date'
    ];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
