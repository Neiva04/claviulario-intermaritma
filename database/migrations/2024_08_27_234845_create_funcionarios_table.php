<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('funcionarios', function (Blueprint $table) {
        $table->id();
        $table->string('intermaritima_id')->unique();
        $table->string('nome');
        $table->string('cargo');
        $table->boolean('is_admin')->default(false);
        $table->foreignId('departamento_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funcionarios');
    }
};
