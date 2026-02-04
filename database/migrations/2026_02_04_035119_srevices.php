<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
        $table->id();
        $table->string('nama_layanan');           // Contoh: Aduan Konten, Cek Rekening
        $table->text('deskripsi');                // Penjelasan singkat layanan
        $table->unsignedInteger('kategori_id');               // e-Government, Keamanan Siber, dll.
        $table->string('url_akses')->nullable();  // Link menuju layanan terkait
        $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
