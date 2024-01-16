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
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('source');
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('user_member_id')->nullable();
            $table->foreign('user_member_id')->references('id')->on('users')->onDelete('set null');
            $table->string('phone')->nullable();
            $table->string('website')->nullable();
            $table->string('country')->nullable();
            $table->string('tags')->nullable();
            $table->string('default_language')->nullable();
            $table->text('description')->nullable();
            $table->boolean('public')->default(false);
            $table->boolean('contacted_today')->default(false);
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
        Schema::dropIfExists('leads');
    }
};
