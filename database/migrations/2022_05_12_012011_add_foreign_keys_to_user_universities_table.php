<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_university', function (Blueprint $table) {
            $table->foreign(['university_id'], 'fk_user_university__university_id')->references(['id'])->on('universities')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['user_id'], 'fk_user_university__user_id')->references(['id'])->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_university', function (Blueprint $table) {
            $table->dropForeign('fk_user_university__university_id');
            $table->dropForeign('fk_user_university__user_id');
        });
    }
}
