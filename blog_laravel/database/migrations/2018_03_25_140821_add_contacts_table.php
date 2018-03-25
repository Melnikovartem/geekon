<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // создать таблицу contacts
        Schema::create('contacts', function (Blueprint $table) {
            //primary key auto increament
            $table->increments('id');
            //varchar 255 not null
            $table->string('name');
            //varchar 255
            $table->string('job')->nullable();
            //varchar 255
            $table->string('email')->nullable();
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}

