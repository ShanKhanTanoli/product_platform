<?php

use App\Models\Color;
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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();

            //User Foreign Key
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('name')->nullable();
            $table->string('value')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Color::create([
            'user_id' => 1,
            'name' => 'Red',
            'value' => '#000',
            'slug' => Str::random(10),
        ]);

        Color::create([
            'user_id' => 1,
            'name' => 'Green',
            'value' => '#000',
            'slug' => Str::random(10),
        ]);

        Color::create([
            'user_id' => 1,
            'name' => 'Blue',
            'value' => '#000',
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
        Schema::dropIfExists('colors');
    }
};
