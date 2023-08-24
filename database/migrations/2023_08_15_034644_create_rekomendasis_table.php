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
        Schema::create('rekomendasis', function (Blueprint $table) {
            $table->id();
            $table->integer('temuan_id');
            $table->text('deskripsi_temuan');
            $table->string('status_rekomendasi');
            $table->text('tanggapan_auditee');
            $table->string('evidence');
            $table->text('update_tanggapan_auditee');
            $table->date('tgl_update_tanggapan_auditee');
            $table->integer('user_id')->nullable();
            $table->integer('approver1_id')->nullable();
            $table->integer('approver2_id')->nullable();
            $table->string('update_evidence');
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
        Schema::dropIfExists('rekomendasis');
    }
};
