<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temuans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_upload_temuans');
            $table->date('tgl_jatuh_tempo');
            $table->text('deskripsi_temuan');
            $table->string('nomor_temuan');
            $table->string('tingkat_resiko');
            $table->integer('jumlah_rekomendaso')->nullable();
            $table->integer('user_id')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('temuans');
    }
};
