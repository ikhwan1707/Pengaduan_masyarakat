<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::table('users', function (Blueprint $table) {
        $table->enum('jenkel',['Laki-Laki', 'Perempuan'])->default('Laki-Laki')->nullable();
        $table->text('alamat')->nullable();
        $table->char('rt', 4)->nullable();
        $table->char('rw', 4)->nullable();
        $table->char('kode_pos', 5)->nullable();
        $table->char('province_id', 2)->nullable();
        $table->char('regency_id', 4)->nullable();
        $table->char('village_id', 10)->nullable();
        $table->char('district_id', 7)->nullable();
     });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
