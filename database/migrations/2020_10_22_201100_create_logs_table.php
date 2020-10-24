<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('passport_id');
            $table->string('field_name');
            $table->string('value');
            $table->unsignedBigInteger('updated_by');
            $table->timestamps();

            $table->foreign('passport_id')
                ->references('id')
                ->on('passports');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
