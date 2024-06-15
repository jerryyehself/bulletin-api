<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qualities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num')->comment('單號');
            $table->timestamp('apply_date')->useCurrent()->comment('申請日期');
            $table->timestamp('acceptance_date')->comment('檢驗日期');
            $table->string('applier_id')->comment('申請者編號');
            $table->unsignedInteger('component_id')->comment('料品編號');
            $table->unsignedInteger('counter')->comment('檢驗數量');
            $table->boolean('result')->comment('檢驗結果');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('applier_id')->references('user_id')->comment('申請者編號');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qualities');
    }
}
