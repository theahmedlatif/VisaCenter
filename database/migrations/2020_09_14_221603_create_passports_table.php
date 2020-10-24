<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passports', function (Blueprint $table) {
            $table->id();
            $table->string('applicantName');
            $table->string('passportNumber','50');
            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('status_id')->default(1);
            $table->text('details')->nullable();
            $table->string('nationality');
            $table->timestamps();

            $table->foreign('creator_id')
                ->references('id')
                ->on('users');

            $table->foreign('owner_id')
                ->references('id')
                ->on('users');

            $table->foreign('status_id')
                ->references('id')
                ->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passports');
    }
}
