<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->text('body');
            $table->foreignId('user_id')
                ->constrained('mdl_user')
                ->onDelete('cascade');
            $table->foreignId('thread_comment_id')
                ->constrained('thread_comments')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thread_comment_replies');
    }
};
