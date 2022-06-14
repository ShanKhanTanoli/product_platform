<?php

use App\Models\Language;
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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });

        Language::create([
            'name' => 'en',
            'description' => 'English',
            'slug' => Str::random(10),
        ]);

        Language::create([
            'name' => 'es',
            'description' => 'Spanish',
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
        Schema::dropIfExists('languages');
    }
};
