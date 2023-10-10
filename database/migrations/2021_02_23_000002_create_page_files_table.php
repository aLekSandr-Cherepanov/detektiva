<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePageFilesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('page_files', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('page_id');
                $table->unsignedBigInteger('file_id');
                $table->BigInteger('order');
                $table->string('alt')->nullable();
                $table->string('title')->nullable();
                $table->unsignedInteger('width')->nullable();
                $table->unsignedInteger('height')->nullable();
                $table->timestamps();

                $table->foreign('page_id')
                    ->references('id')
                    ->on('pages')
                    ->onDelete('cascade');

                $table->foreign('file_id')
                    ->references('id')
                    ->on('files')
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
            Schema::dropIfExists('page_files');
        }
    }
