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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')
              ->constrained()
              ->cascadeOnDelete();
            $table->string('name');
            $table->string('code')->unique();
            $table->integer('duration')->nullable();
            $table->decimal('fees', 10, 2)->nullable();
            $table->enum('level', ['UG', 'PG','Diploma','Certificate'])->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            Schema::dropIfExists('courses');
        });
    }
};
