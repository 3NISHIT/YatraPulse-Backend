<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('bookings') && Schema::hasColumn('bookings', 'total-price') && ! Schema::hasColumn('bookings', 'total_price')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->renameColumn('total-price', 'total_price');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('bookings') && Schema::hasColumn('bookings', 'total_price') && ! Schema::hasColumn('bookings', 'total-price')) {
            Schema::table('bookings', function (Blueprint $table) {
                $table->renameColumn('total_price', 'total-price');
            });
        }
    }
};
