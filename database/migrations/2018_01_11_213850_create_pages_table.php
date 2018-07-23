<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->text('meta');
            $table->text('meta_ru');
            $table->string('title');
            $table->string('title_ru');
            $table->string('name')->unique();
            $table->string('name_ru')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->text('description_ru');
            $table->integer('locality')->default(0);
            $table->integer('category_id');
            $table->string('view');
            $table->text('content')->default(null);
            $table->text('content_ru')->default(null);
            $table->text('image_path')->default(null);
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
        Schema::dropIfExists('pages');
    }
}
