<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_code',
        'name',
        'sex',
        'contact_number',
        'profile_picture',
        'region',
        'name_of_office',
        'position',
    ];
}
