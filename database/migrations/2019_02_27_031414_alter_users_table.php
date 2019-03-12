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
            //add username, enable login using username beside email
            $table->string('username')->unique()->after('id');
            //add avatar, store photo of user
            $table->string('avatar')->unique()->after('password');
            //Add field active for feature Enable and disable user
            $table->enum('active', ['Y', 'N'])->defaut('Y')->after('avatar');
            //add user creator, recording user initiator
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
        //Remove all fields currently added, rollback
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('username');
            $table->dropColumn('avatar');
            $table->dropColumn('active');
            $table->dropColumn('user_creator');
        });
    }
}
