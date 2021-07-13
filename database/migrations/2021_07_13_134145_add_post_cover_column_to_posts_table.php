<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPostCoverColumnToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_cover')->nullable()->after('slug'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        if (Schema::hasColumn('post_cover')) {

            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('post_cover');
            });
        }
    }
}
