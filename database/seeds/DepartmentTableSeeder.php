<?php

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deparments = [
            '管理科',
            '外科',
            '内科'
        ];

        foreach ($deparments as $deparment) {
            Department::create([
                'name' => $deparment
            ]);
        }
    }
}
