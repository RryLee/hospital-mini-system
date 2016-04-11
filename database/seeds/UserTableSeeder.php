<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'department_id' => 1,
                'name' => '王晓',
                'sex' => 'male',
                'age' => '33',
                'email' => 'admin@admin.com',
                'password' => bcrypt('121212')
            ],
            [
                'department_id' => 1,
                'name' => '李晓',
                'sex' => 'female',
                'age' => '42',
                'email' => 'admin1@admin.com',
                'password' => bcrypt('121212')
            ],
            [
                'department_id' => 2,
                'name' => '李康',
                'sex' => 'male',
                'age' => '28',
                'email' => 'doc1@doc.com',
                'password' => bcrypt('121212')
            ],
            [
                'department_id' => 3,
                'name' => '阿什顿',
                'sex' => 'female',
                'age' => '31',
                'email' => 'doc2@doc.com',
                'password' => bcrypt('121212')
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        foreach (range(3, 9) as $i) {
            User::create([
                'department_id' => mt_rand(2, 3),
                'name' => '李' . $i,
                'age' => 20 + $i,
                'sex' => 'male',
                'email' => "doc{$i}@doc.com",
                'password' => bcrypt('121212')
            ]);
        }
    }
}
