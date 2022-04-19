<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('term')->nullable(false)->default('2022-04');
            $table->string('store_org_code')->nullable()->default(null);
            $table->string('store_name')->nullable(false);
            $table->integer('service_sales')->nullable(false)->default('0');
            $table->integer('loyality')->nullable(false)->default('0');
            $table->integer('goods_sales')->nullable(false)->default('0');
            $table->integer('other_sales')->nullable(false)->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
};
