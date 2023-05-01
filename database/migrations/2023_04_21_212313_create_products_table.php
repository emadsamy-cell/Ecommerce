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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('old-price' , 12 , 2);
            $table->decimal('new-price' , 12 , 2)->nullable();
            $table->string('image')->nullable();
            $table->text('description');
            $table->integer('discount')->default(0);
            $table->integer('avaliable')->default(0);
            $table->boolean('Isdiscount');
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
