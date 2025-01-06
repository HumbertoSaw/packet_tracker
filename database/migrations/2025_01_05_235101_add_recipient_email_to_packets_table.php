<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->string('recipient_email')->after('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('packets', function (Blueprint $table) {
            $table->dropColumn('recipient_email');
        });
    }
};
