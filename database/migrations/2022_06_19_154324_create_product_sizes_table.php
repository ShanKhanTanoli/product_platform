<?php

use App\Models\ProductSize;
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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();

            //Product Foreign Key
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Sizes Foreign Key
            $table->unsignedBigInteger('size_id')->nullable();
            $table->foreign('size_id')->references('id')
                ->on('sizes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });


        for ($product = 1; $product < 31; $product++) {
            for ($size = 1; $size < mt_rand(1,5); $size++) {
                ProductSize::create([
                    'product_id' => $product,
                    'size_id' => $size,
                ]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
};
