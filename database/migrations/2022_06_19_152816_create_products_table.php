<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Str;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('price')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->unique()->nullable();

            //User Foreign Key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Product Foreign Key
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->boolean('publish')->nullable();

            $table->mediumText('featured_image')->nullable();

            $table->unsignedBigInteger('quantity')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        $sellers = User::where('role','seller')->get();

        foreach ($sellers as $seller) {
            for ($product = 1; $product < 21; $product++) {
                Product::create([
                    'name' => 'Product'.$product,
                    'price' => mt_rand(100, 1000),
                    'description' => 'This is Product' . $product,
                    'slug' => Str::random(10),
                    'user_id' => $seller->id,
                    'category_id' => mt_rand(1, 3),
                    'publish' => mt_rand(0, 1),
                    'featured_image' => null,
                    'quantity' => mt_rand(1,20),
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
        Schema::dropIfExists('products');
    }
};
