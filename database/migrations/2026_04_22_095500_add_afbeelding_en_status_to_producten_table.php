<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('Product', function (Blueprint $table) {
            $table->string('Afbeelding')->nullable()->after('Locatie');
            $table->text('Beschrijving')->nullable()->after('Afbeelding');
        });
    }

    public function down(): void
    {
        Schema::table('Product', function (Blueprint $table) {
            $table->dropColumn(['Afbeelding', 'Beschrijving']);
        });
    }
};