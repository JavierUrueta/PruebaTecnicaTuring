<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directors', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // Agregar el campo name
            $table->string('email')->unique();  // Agregar el campo email
            $table->string('password');     // Agregar el campo password
            $table->unsignedTinyInteger('role')->default(1); // asumiendo que 'rol' es una columna de tipo entero
            $table->string('remember_token', 100)->nullable(); // agregamos la columna remember_token
            $table->timestamps();           // Para los campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directors');
    }
}
