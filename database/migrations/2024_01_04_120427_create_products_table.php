<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 3);
            $table->decimal('discount', 10, 3);
            $table->text('description');
            $table->string('slug');
            $table-> bigInteger('category_id')->unsigned();
            $table->foreign('category_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table-> bigInteger('brand_id')->unsigned();
            $table->foreign('brand_id')
            ->references('id')
            ->on('brands')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamp('delete_at')->nullable();
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
        Schema::dropIfExists('products');
    }
};