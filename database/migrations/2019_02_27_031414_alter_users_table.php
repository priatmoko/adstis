<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create new field username to table user
        Schema::table('users', function(Blueprint $table){
            $table->string('username')->unique()->after('id');
            $table->enum('active', ['Y', 'N'])->defaut('Y')->after('password');
            $table->integer('user_creator')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Remove new field username from table users
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('username');
        });
    }
}
