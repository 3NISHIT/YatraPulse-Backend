<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $textColumns = [
            'destinations' => ['description', 'image'],
            'tours' => ['description', 'inclusions', 'exclusions'],
            'itineraries' => ['description'],
        ];

        foreach ($textColumns as $tableName => $columns) {
            if (! Schema::hasTable($tableName)) {
                continue;
            }

            foreach ($columns as $columnName) {
                if (Schema::hasColumn($tableName, $columnName) && Schema::getColumnType($tableName, $columnName) !== 'text') {
                    Schema::table($tableName, function (Blueprint $table) use ($columnName) {
                        $table->text($columnName)->change();
                    });
                }
            }
        }

        if (Schema::hasTable('tours') && Schema::hasColumn('tours', 'price') && Schema::getColumnType('tours', 'price') !== 'decimal') {
            Schema::table('tours', function (Blueprint $table) {
                $table->decimal('price', 10, 2)->change();
            });
        }
    }

    public function down(): void
    {
        // Keep expanded text and decimal columns to avoid truncating saved content.
    }
};
