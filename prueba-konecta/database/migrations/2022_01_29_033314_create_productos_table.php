<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_producto');
            $table->string('referencia');
            $table->integer('precio');
            $table->integer('peso');
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stock');
            $table->date('fecha_creacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
