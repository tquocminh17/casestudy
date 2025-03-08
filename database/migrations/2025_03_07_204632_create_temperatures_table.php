<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('CREATE EXTENSION IF NOT EXISTS timescaledb');

        DB::statement('
            CREATE TABLE temperatures (
                recorded_at TIMESTAMPTZ NOT NULL,
                device_id TEXT NOT NULL,
                value FLOAT NOT NULL
            );
        ');

        DB::statement("SELECT create_hypertable('temperatures', by_range('recorded_at'))");
        DB::statement("SELECT add_dimension('temperatures', by_hash('device_id', 2))");
    }

    public function down(): void
    {
        Schema::dropIfExists('temperatures');
    }
};
