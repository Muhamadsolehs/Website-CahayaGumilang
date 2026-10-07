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
        Schema::create('tb_pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('id_user')->constrained('tb_user')->onDelete('cascade');
            $table->foreignId('id_kategori')->constrained('tb_kategori_layanan')->onDelete('cascade');
            $table->string('nama');
            $table->string('telepon');
            $table->text('lokasi_acara');
            $table->date('tanggal_acara')->unique();
            $table->time('waktu_acara');
            $table->integer('total_tagihan'); // Total tagihan
            $table->integer('jumlah_dp'); // DP yang harus dibayar
            $table->enum('status_pesanan', ['Pending', 'Diproses', 'Selesai','Cancel','Cancel Diterima']);
            $table->enum('statusBayarDP', ['Pending', 'Dibayar']);
            $table->enum('statusBayarPelunasan', ['Pending', 'Dibayar'])->default('Pending');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pesanan');
    }
}


?>
