<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
			$table->string('title');
            $table->string('sources_id')->references('id')->on('sources')->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_content');
            $table->text('description')->unasigned()->nullable();
            $table->text('note')->unasigned()->nullable();
            $table->integer('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('tags')->unasigned()->nullable();
            $table->integer('watch_count')->unsigned()->nullable();
            $table->integer('status')->unsigned();
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
        Schema::dropIfExists('contents');
    }
}
