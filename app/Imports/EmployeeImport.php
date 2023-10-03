<?php

namespace App\Imports;

use App\Models\ImportEmployee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ImportEmployee([
            'employee_code'=>$row['employee_code'],
            'name'=>$row['name'],
            'sex'=>$row['sex'],
            'contact_number'=>$row['contact_number'],
            'profile_picture'=>$row['profile_picture'],
            'region'=>$row['region'],
            'name_of_office'=>$row['name_of_office'],
            'position'=>$row['position'],
        ]);
    }
}
