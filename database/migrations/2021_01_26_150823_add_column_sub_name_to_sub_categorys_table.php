<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubNameToSubCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_categorys', function (Blueprint $table) {
            $table->string('sub_name')->after('name');
            $table->string('sub_slug')->after('sub_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_categorys', function (Blueprint $table) {
            $table->dropColumn(['sub_name','sub_slug']) ;
        });
    }
}
