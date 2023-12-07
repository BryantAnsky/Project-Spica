<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /*

Run the migrations.*/
  public function up(): void{Schema::create('mahasiswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->char('npm', 10);
            $table->string('nama', 50);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('foto', 50)->nullable;

            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references
            ('id')->on('prodis')->restrictOnDelete()
                ->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /*

Reverse the migrations.*/
  public function down(): void{Schema::dropIfExists('mahasiswas');}
};
