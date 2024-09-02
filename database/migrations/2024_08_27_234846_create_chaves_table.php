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
        Schema::create('chaves', function (Blueprint $table) {
            $table->id();
            $table->string('intermaritima_id')->unique();
            $table->unsignedBigInteger('sala_id');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
            $table->boolean('is_locado')->default(false);
            $table->unsignedBigInteger('funcionario_id')->nullable();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios')->onDelete('no action')->onUpdate('no action');
            $table->timestamps();
        });
    }
    

    


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chaves');
    }
};
