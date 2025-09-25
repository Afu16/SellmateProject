<?php

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
        Schema::table('users', function (Blueprint $table) {
        $table->string('school')->nullable();
        $table->string('username')->unique()->after('id');
        $table->string('major')->nullable();
        $table->string('role')->default('user');
        $table->string('foto_link')->nullable();
        $table->string('phone', 15)->nullable();
        $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['school','username', 'major', 'role', 'foto_link', 'phone', 'address']);
    });
    }
};
