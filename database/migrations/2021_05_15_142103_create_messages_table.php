<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->references('id')->on('users');
            $table->string('to');
            $table->string('from')->nullable();
            $table->longText('message');
            $table->string('cost')->nullable();
            $table->string('sold_at')->nullable();
            $table->string('messageid')->nullable();
            $table->string('status')->nullable();
            $table->string('statusCode')->nullable();
            $table->string('createdOn');
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
        Schema::dropIfExists('messages');
    }
}
