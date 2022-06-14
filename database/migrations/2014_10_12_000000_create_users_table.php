<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('user_name')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('number')->unique()->nullable();
            $table->mediumText('address')->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->unique()->nullable();

            $table->rememberToken()->nullable();
            $table->timestamps();
        });

        User::create([
            'name' => 'admin',
            'user_name' => 'admin',
            'email' => 'admin@email.com',
            'number' => mt_rand(100000000000, 999999999999),
            'address' => 'This is the address',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'slug' => strtoupper(Str::random(20)),
        ]);

        for ($buyer = 1; $buyer < 4; $buyer++) {
            User::create([
                'name' => 'buyer' . $buyer,
                'user_name' => 'buyer' . $buyer,
                'email' => 'buyer' . $buyer . '@email.com',
                'number' => mt_rand(100000000000, 999999999999),
                'address' => 'This is the address',
                'password' => bcrypt('password'),
                'role' => 'buyer',
                'slug' => strtoupper(Str::random(20)),
            ]);
        }

        for ($seller = 1; $seller < 4; $seller++) {
            User::create([
                'name' => 'seller' . $seller,
                'user_name' => 'seller' . $seller,
                'email' => 'seller' . $seller . '@email.com',
                'number' => mt_rand(100000000000, 999999999999),
                'address' => 'This is the address',
                'password' => bcrypt('password'),
                'role' => 'seller',
                'slug' => strtoupper(Str::random(20)),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
