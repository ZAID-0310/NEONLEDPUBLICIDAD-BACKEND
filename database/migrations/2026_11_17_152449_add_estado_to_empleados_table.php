<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('empleados', 'estado')) {
            return;
        }

        Schema::table('empleados', function (Blueprint $table) {
            $table->boolean('estado')->default(true)->after('id_rol');
            $table->index('estado');
        });
    }

    public function down(): void
    {
        if (!Schema::hasColumn('empleados', 'estado')) {
            return;
        }

        Schema::table('empleados', function (Blueprint $table) {
            $table->dropIndex(['estado']);
            $table->dropColumn('estado');
        });
    }
};