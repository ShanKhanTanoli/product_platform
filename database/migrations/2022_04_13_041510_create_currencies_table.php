<?php

use App\Models\Currency;
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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Currency::create([
            'name' => 'usd',
            'description' => 'United States',
            'slug' => Str::random(10),
        ]);

        Currency::create([
            'name' => 'eur',
            'description' => 'Europe',
            'slug' => Str::random(10),
        ]);

        Currency::create([
            'name' => 'pkr',
            'description' => 'Pakistan',
            'slug' => Str::random(10),
        ]);

        Currency::create([
            'name' => 'inr',
            'description' => 'India',
            'slug' => Str::random(10),
        ]);

        Currency::create([
            'name' => 'gbp',
            'description' => 'Pound Sterling',
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
        Schema::dropIfExists('currencies');
    }
};
