<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateFilesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('files', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->tinyInteger('type')->default(0);
                $table->string('filename')->default('');
                $table->string('uri')->default('');
                $table->string('mimetype')->default('');
                $table->unsignedBigInteger('filesize')->default(0);
                $table->boolean('active')->default(true);
                $table->unsignedBigInteger('fid');
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
            Schema::dropIfExists('files');
        }
    }
