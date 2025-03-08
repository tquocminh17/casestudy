<?php declare(strict_types=1);

use App\Enums\Device;
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
                recorded_at timestamp without time zone,
                device_id TEXT NOT NULL,
                value FLOAT NOT NULL
            ) PARTITION BY LIST (device_id);
        ');

        foreach (Device::values() as $device) {
            DB::statement("
                CREATE TABLE temperatures_{$device} PARTITION OF temperatures FOR VALUES IN ('$device') PARTITION BY RANGE (recorded_at);
            ");

            foreach ($this->years() as $year) {
                DB::statement("
                    CREATE TABLE temperatures_{$device}_{$year} PARTITION OF temperatures_{$device} FOR VALUES FROM ('$year-01-01') TO ('$year-12-31');
                ");
            }
        }
    }

    /**
     * @return array<int>
     */
    private function years(): array
    {
        $currentYear = now()->year;

        return range($currentYear - 10, $currentYear + 10);
    }

    public function down(): void
    {
        Schema::dropIfExists('temperatures');
    }
};
