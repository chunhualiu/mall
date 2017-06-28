<?php
/**
 * This file is part of Notadd.
 *
 * @datetime 2017-06-28 14:04:44
 */

use Illuminate\Database\Schema\Blueprint;
use Notadd\Foundation\Database\Migrations\Migration;

/**
 * Class CreateMallStoreOutletsTable.
 */
class CreateMallStoreOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('mall_store_outlets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('store_id')->comment('店铺 ID');
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
        $this->schema->drop('mall_store_outlets');
    }
}
