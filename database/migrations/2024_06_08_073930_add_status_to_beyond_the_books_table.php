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
        Schema::table('beyond_the_books', function (Blueprint $table) {
            $table->enum('status', ['not_started', 'in_progress', 'completed'])->default('not_started');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('beyond_the_books', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
