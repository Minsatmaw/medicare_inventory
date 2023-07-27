<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('item_stocks', function (Blueprint $table) {
      $table->id();
      $table->foreignId('person_id')->constrained()->onDelete('cascade');
      $table->foreignId('item_id')->constrained()->onDelete('cascade');
      $table->string('department_id');
      $table->unsignedBigInteger('stock');
      $table->boolean('is_in')->default(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('item_stocks');
  }
};
