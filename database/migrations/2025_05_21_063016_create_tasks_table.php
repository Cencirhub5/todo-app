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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Otomatik artan ID (Primary Key)
            $table->string('title'); // Görevin başlığı için bir metin sütunu
            $table->text('description')->nullable(); // Görevin açıklaması için daha uzun bir metin sütunu, boş olabilir (nullable)
            $table->boolean('is_completed')->default(false); // Görevin tamamlanıp tamamlanmadığını belirten boolean (true/false) sütunu, varsayılan değeri false
            $table->timestamps(); // created_at ve updated_at sütunlarını otomatik oluşturur
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
