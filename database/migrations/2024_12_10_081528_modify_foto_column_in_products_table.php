<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('foto', 255)->change(); // Increase the length of the 'foto' column
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->string('foto', 100)->change(); // Revert to the original length if necessary
    });
}

};
