<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_add_membership_type_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
    $table->string('membership_type'); // tanpa default!
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('membership_type');
    });
}

};
