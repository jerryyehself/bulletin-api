<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num')->comment('單號');
            $table->string('closed_by')->comment('關閉提醒者ID');
            $table->string('title')->comment('標題');
            $table->string('abstract')->comment('說明');
            $table->timestamp('limit_date')->comment('提醒期限');
            $table->timestamp('closed_date')->comment('關閉提醒時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bulletins');
    }
}
