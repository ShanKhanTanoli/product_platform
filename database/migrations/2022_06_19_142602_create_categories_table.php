<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Category::create([
            'name' => 'Laptops',
            'slug' => Str::random(10),
        ]);

        Category::create([
            'name' => 'Mobiles',
            'slug' => Str::random(10),
        ]);

        Category::create([
            'name' => 'Shirt',
            'slug' => Str::random(10),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
