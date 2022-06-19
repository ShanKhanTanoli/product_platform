<?php

use App\Models\Size;
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
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('short_form')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Size::create([
            'name' => 'Extra Small',
            'short_form' => 'XS',
            'slug' => Str::random(10),
        ]);

        Size::create([
            'name' => 'Small',
            'short_form' => 'S',
            'slug' => Str::random(10),
        ]);

        Size::create([
            'name' => 'Medium',
            'short_form' => 'M',
            'slug' => Str::random(10),
        ]);

        Size::create([
            'name' => 'Large',
            'short_form' => 'L',
            'slug' => Str::random(10),
        ]);

        Size::create([
            'name' => 'Extra Large',
            'short_form' => 'XL',
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
        Schema::dropIfExists('sizes');
    }
};
