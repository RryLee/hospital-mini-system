<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(DrugTableSeeder::class);
        $this->call(OrderTableSeeder::class);
    }
}
