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
        Schema::table('tasks', function (Blueprint $table) {
            // to_do_list_id sütununu ekle, boş olabilir (nullable)
            // Çünkü mevcut görevlerin henüz bir listesi olmayacak
            $table->foreignId('todolist_id')->nullable()->constrained('todolists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            // foreign key'i düşür
            $table->dropForeign(['todolist_id']);
            // sütunu düşür
            $table->dropColumn('todolist_id');
        });
    }
};