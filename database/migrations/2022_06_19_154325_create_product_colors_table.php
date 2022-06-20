<?php

use App\Models\ProductColor;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();

            //Product Foreign Key
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Color Foreign Key
            $table->unsignedBigInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')
                ->on('colors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });


        for ($product = 1; $product < 31; $product++) {
            for ($color = 1; $color < mt_rand(1, 3); $color++) {
                ProductColor::create([
                    'product_id' => $product,
                    'color_id' => $color,
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
        Schema::dropIfExists('product_colors');
    }
};
