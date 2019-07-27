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
                $table->integer('category_id')->default('');
                $table->string('description')->after('title')->default('');
                $table->text('content')->after('description')->default('')->change();
                $table->string('image')->after('content')->default('');
                $table->string('published_at')->after('image')->default('');
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
            $table->dropColumn(['description', 'content', 'image', 'published_at']);
        });
    }
}
