<?php

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = [
            ['patient' => '小明', 'user_id' => 3, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小百', 'user_id' => 4, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小红', 'user_id' => 5, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小黑', 'user_id' => 6, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小李', 'user_id' => 7, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小王', 'user_id' => 8, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小赵', 'user_id' => 9, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '小小', 'user_id' => 10, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
            ['patient' => '笑笑', 'user_id' => 11, 'drug_id' => mt_rand(1, 6), 'drug_amount' => mt_rand(1, 10)],
        ];

        foreach ($orders as $order) {
            Order::create($order);
        }
    }
}
