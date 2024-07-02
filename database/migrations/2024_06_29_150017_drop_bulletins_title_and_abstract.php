<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropBulletinsTitleAndAbstract extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bulletins', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('abstract');
            $table->dropColumn('limit_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bulletins', function (Blueprint $table) {
            $table->string('title')->comment('標題');
            $table->string('abstract')->comment('說明');
            $table->timestamp('limit_date')->comment('提醒期限');
        });
    }
}
