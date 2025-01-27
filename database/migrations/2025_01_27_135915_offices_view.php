<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\{
    DB
};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW offices_view AS (select distinct office from experiences e)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS offices_view');
    }
};
