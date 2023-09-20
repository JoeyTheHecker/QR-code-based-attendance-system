<?php

namespace Database\Seeders;

use App\Models\Attended;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Employee::factory(250)->create()
        //         ->each(function($employee) {
        //             Status::create([
        //                 'employee_id' => $employee->id,
        //                 'status' => 'approved'
        //             ]);
        //         });
        
        \App\Models\Employee::factory(500)->create()
                ->each(function($employee) {
                    Attended::create([
                        'employee_id' => $employee->id,
                        'attended_date' => now()
                    ]);
                });
                
    }
}
