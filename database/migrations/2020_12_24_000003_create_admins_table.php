<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateAdminsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('admins', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('phone')->nullable();
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamp('email_verified_at')->nullable();
                $table->rememberToken();
                $table->string('locale')->default('en');
                $table->boolean('active')->default(false);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('clients');
        }
    }
