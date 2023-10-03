<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'gender',
        'designation',
        'province_lgu_jpo',
        'delegation',
        'email',
        'contact_number',
        'profile_picture',
        'bank_name',
        'attached_file',
        'dt_deposit_transfer',
        'amount',
    ];


    public function status(){
        return $this->hasOne(Status::class);
    }

    public function attended(){
        return $this->hasOne(Attended::class);
    }
    public function attendedTwo(){
        return $this->hasOne(AttendedTwo::class);
    }
    public function attendedThree(){
        return $this->hasOne(AttendedThree::class);
    }
}
