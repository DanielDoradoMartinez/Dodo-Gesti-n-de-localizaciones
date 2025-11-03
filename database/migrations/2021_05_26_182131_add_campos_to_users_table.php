<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->string('nombre')->nullable();
			 $table->string('apellido1')->nullable();
			  $table->string('apellido2')->nullable();
			    $table->boolean('admim')->nullable()->default(false);
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
        //
		$table->dropColumn('nombre');
		$table->dropColumn('apellido1');
		$table->dropColumn('apellido2');
		$table->dropColumn('admim');
        });
    }
}
