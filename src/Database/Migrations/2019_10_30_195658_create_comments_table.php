<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('rate')->nullable();
            $table->string('phone')->nullable();
            $table->text('body')->nullable();
            $table->enum('status', ['published', 'unpublished'])->default('unpublished');
            $table->bigInteger('parent_id')->nullable();

            $table->bigInteger('commentable_id');
            $table->string('commentable_type');
        
            $table->timestamps();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Schema::dropIfExists('comments');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
