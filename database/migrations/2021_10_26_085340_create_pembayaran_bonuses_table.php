<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran_bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('buruh_a')->nullable();
            $table->integer('buruh_b')->nullable();
            $table->integer('buruh_c')->nullable();
            $table->integer('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembayaran_bonuses');
    }
}
