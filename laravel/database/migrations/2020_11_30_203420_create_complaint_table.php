<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaint', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('text_problem', 3000);
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('client_app')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->boolean('in_work')->nullable();
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
        Schema::dropIfExists('complaint');
    }
}
