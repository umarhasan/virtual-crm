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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('lead_id');
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->foreign('lead_id')->references('id')->on('leads'); // Assuming you have a leads table
            $table->decimal('total_amount');
            $table->decimal('amount_paid');
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
        Schema::dropIfExists('invoices');
    }
};
