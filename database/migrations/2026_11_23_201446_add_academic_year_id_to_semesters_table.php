<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('semesters', 'academic_year_id')) {
            Schema::table('semesters', function (Blueprint $table) {
                $table->foreignId('academic_year_id')
                    ->nullable()
                    ->constrained('academic_years')
                    ->restrictOnDelete();
            });
        }
    }

    public function down(): void
    {
        // Intentionally left empty to avoid removing
        // an academic_year_id column already in use.
    }
};