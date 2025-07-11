<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('recipes', function (Blueprint $table) {
         $table->id();
         $table->foreignId('user_id')->constrained()->cascadeOnDelete();
         $table->foreignId('category_id')->constrained()->restrictOnDelete();
         $table->string('title');
         $table->text('description');
         $table->unsignedBigInteger('likes')->default(0);
         $table->string('image')->nullable();
         $table->boolean('is_published')->default(false);
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('recipes');
   }
};
