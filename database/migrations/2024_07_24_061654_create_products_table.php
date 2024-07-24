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
            $table->text('description');
            $table->decimal('price', 8, 2); //You can store up to 8 digits in total. Out of those 8 digits, 2 digits will be after the decimal point.
            $table->integer('stock');
        //    $table->unsignedBigInteger('category_id');
            $table->string('image')->nullable();
            $table->timestamps();
            // Foreign key constraint (if categories table exists)
          //  $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
