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
      Schema::create('blogs', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->unsignedBigInteger('author_id');
         $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
         $table->foreignId('category_id')->constrained();
         $table->text('content');
         $table->string('image');
         $table->date('date');
         $table->boolean('comments_enabled')->default(true);
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
      Schema::dropIfExists('blogs');
   }
};
