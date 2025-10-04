<?php

declare(strict_types=1);

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
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('reviews');
            $table->foreignId('created_by')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('cellphone');
            $table->dropColumn('email');
            $table->dropConstrainedForeignId('parent_id');
            $table->foreignId('created_by')->change();
        });
    }
};
