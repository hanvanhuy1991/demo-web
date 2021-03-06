<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInforsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type')->default(1);
            $table->bigInteger('parent_id')->default(0);
            $table->bigInteger('bank_id')->nullable();
            $table->bigInteger('area_id')->nullable();
            $table->string('level')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('master_name')->nullable();
            $table->string('brands_name')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type', 'parent_id', 'bank_id', 'area_id', 'address', 'phone', 'image', 'bank_number', 'master_name', 'brands_name');
        });
    }
}
