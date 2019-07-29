<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompletePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('user_id')->default()->after('id');
            $table->integer('category_id')->default()->after('user_id');
            $table->string('description')->default('')->after('title');
            $table->text('content')->default('')->after('description')->change();
            $table->string('image')->default('')->after('content');
            $table->string('published_at')->default('')->after('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['user_id', 'category_id', 'description', 'content', 'image', 'published_at']);
        });
    }
}
