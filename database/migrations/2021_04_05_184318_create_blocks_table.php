<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateBlocksTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('blocks', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->tinyInteger('type')->default(0);
                $table->bigInteger('order')->default(0);
                $table->boolean('active')->default(false);
                $table->uuid('admin_id');
                $table->timestamps();

                $table->foreign('admin_id')
                    ->references('id')
                    ->on('admins')
                    ->onDelete('cascade');
            });

            Schema::create('block_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('block_id');
                $table->string('locale')->index();
                $table->text('title');
                $table->longText('content')->nullable();

                $table->unique(['block_id', 'locale']);
                $table->foreign('block_id')
                    ->references('id')
                    ->on('blocks')
                    ->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('block_translations');
            Schema::dropIfExists('blocks');
        }
    }
