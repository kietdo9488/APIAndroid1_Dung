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
        Schema::create('nhan_vien', function (Blueprint $table) {
            $table->id();
            $table->integer('idTaiKhoan');
            $table->string('hinh');
            $table->string('ho');
            $table->string('ten');
            $table->string('soDienThoai');
            $table->integer('soNgayLam');
            $table->integer('tienLuongTheoNgay');
            $table->integer('tienLuongTong');
            $table->integer('tienLuongDaNhan');
            $table->integer('trangThai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_vien');
    }
};
