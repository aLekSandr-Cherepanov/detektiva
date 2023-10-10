<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreatePagesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('pages', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('alias')->index();
                $table->tinyInteger('type')->default(0);
                $table->boolean('active')->default(false);
                $table->uuid('admin_id');
                $table->unsignedBigInteger('nid');
                $table->timestamps();

                $table->unique(['alias']);
                $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            });


            Schema::create('page_translations', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('page_id');
                $table->string('locale')->index();
                $table->text('title');
                $table->text('summary')->nullable();
                $table->longText('content')->nullable();
                $table->text('seo_title')->nullable();
                $table->text('seo_keywords')->nullable();
                $table->text('seo_description')->nullable();
                $table->text('seo_canonical')->nullable();
                $table->text('seo_robots')->nullable();
                $table->text('seo_content')->nullable();

                $table->unique(['page_id', 'locale']);
                $table->foreign('page_id')->references('id')->on('pages')->onDelete('cascade');
            });

        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('page_translations');
            Schema::dropIfExists('pages');
        }
    }
