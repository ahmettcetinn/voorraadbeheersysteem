<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('Reservering', function (Blueprint $table) {
            $table->text('Doel')->nullable()->after('Status');
        });
    }

    public function down(): void
    {
        Schema::table('Reservering', function (Blueprint $table) {
            $table->dropColumn('Doel');
        });
    }
};