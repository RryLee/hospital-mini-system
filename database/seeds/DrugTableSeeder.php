<?php

use App\Models\Drug;
use Illuminate\Database\Seeder;

class DrugTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drugs = [
            ['name' => '同仁堂 五子衍宗丸 60g水蜜丸', 'price' => 24.00, 'function' => '补肾益精，遗精早泄'],
            ['name' => '云南白药创可贴(轻巧透气) 1.5cm*2.3cm*100片', 'price' => 18.00, 'function' => '透气止血'],
            ['name' => '九芝堂桂附地黄丸120g小蜜丸', 'price' => 12.40, 'function' => '壮阳补肾'],
            ['name' => '同仁堂 舒肝和胃丸 6g*10丸', 'price' => 12.00, 'function' => '和胃止痛'],
            ['name' => '同仁堂安神健脑液10ml*10支', 'price' => 39.00, 'function' => '提神醒脑'],
            ['name' => '同仁堂 牛黄上清丸6g*10s 大蜜丸', 'price' => 19.00, 'function' => '清热去火']
        ];

        foreach ($drugs as $drug) {
            Drug::create($drug);
        }
    }
}
