<?php

use App\Models\Setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->mediumText('company_address')->nullable();

            $table->string('comission_percentage')->nullable();

            //Language Foreign Key
            $table->unsignedBigInteger('language_id')->nullable();
            $table->foreign('language_id')->references('id')
                ->on('languages')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //Currency Foreign Key
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')
                ->on('currencies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });

        Setting::create([
            'company_name' => 'LDAP',
            'company_email' => 'company@email.com',
            'company_phone' => '+00000000000',
            'company_address' => 'This is the Address',
            'comission_percentage' => 5,
            'language_id' => 1,
            'currency_id' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
