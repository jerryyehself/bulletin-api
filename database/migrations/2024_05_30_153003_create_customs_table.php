<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('num')->comment('單號');
            $table->timestamp('apply_date')->useCurrent()->comment('申請日期');
            $table->string('applier_id')->comment('申請者編號');
            $table->string('cust_id')->comment('客戶編號');
            $table->text('custom_content')->comment('客製化內容');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('applier_id')->references('user_id')->on('users');
            $table->foreign('cust_id')->references('cust_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customs');
    }
}
