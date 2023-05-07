<?php

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
        Schema::create('profile', function (Blueprint $table) {
            $table->id();
            $table->string('image_path',255)->nullable();
            $table->string('firstname',255)->nullable();
            $table->string('lastname',255)->nullable();
            $table->text('description')->nullable();
            $table->string('expert',255)->nullable();
            $table->string('profession',255)->nullable();
            $table->string('telephone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->text('address')->nullable();
            $table->text('aboutMe')->nullable();
            $table->string('whatsapp',255)->nullable();
            $table->string('telegram',255)->nullable();
            $table->string('twitter',255)->nullable();
            $table->string('instagram',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile');
    }
};
