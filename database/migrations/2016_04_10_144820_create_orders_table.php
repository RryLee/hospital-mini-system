<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $t) {
            $t->increments('id');
            $t->string('patient');
            $t->integer('user_id')->unsigned()->index();
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $t->integer('drug_id')->unsigned()->index();
            $t->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
            $t->integer('drug_amount');
            $t->boolean('completed')->default(0);
            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
