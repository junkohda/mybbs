<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Messages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('post_id')->comment('投稿ID');
            $table->string('poster_name', 64)->comment('投稿者');
            $table->dateTime('created_at')->comment('投稿日時')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('message')->comment('本文')->nullable();
        });

        // ALTER 文を実行しテーブルにコメントを設定
        DB::statement("ALTER TABLE messages COMMENT 'メッセージ'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
