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
        Schema::table('phong_may', function (Blueprint $table) {
            // Thêm trường người dùng và trạng thái vào bảng phòng máy
            $table->unsignedBigInteger('nguoi_dung_id')->nullable();
            $table->enum('trang_thai', ['san_sang', 'dang_su_dung', 'dang_bao_tri'])->default('san_sang');

            // Liên kết trường người dùng với bảng người dùng
            $table->foreign('nguoi_dung_id')->references('id')->on('nguoi_dung');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('phong_may', function (Blueprint $table) {
            // Xóa trường người dùng và trạng thái khỏi bảng phòng máy
            $table->dropColumn('nguoi_dung_id');
            $table->dropColumn('trang_thai');
        });
    }
};
