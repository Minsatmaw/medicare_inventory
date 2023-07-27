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
        Schema::table('item_records', function (Blueprint $table) {
            $table->longText('description')->after('stock')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_records', function (Blueprint $table) {
            $table->longText('description')->after('stock')->nullable()->change();

        });
    }
};
