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
      Schema::create('category_row', function (Blueprint $table) {
         $table->unsignedBigInteger('category_id');
         $table->unsignedBigInteger('row_id');
         $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
         $table->foreign('row_id')->references('id')->on('rows')->onDelete('cascade');
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
      Schema::dropIfExists('category_row');
   }
};
