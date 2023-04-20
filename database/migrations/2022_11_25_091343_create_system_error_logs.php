<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_error_logs', function (Blueprint $table) {
            $table->id();
            $table->string('uri');
            $table->string('ip');
            $table->string('user_agent');
            $table->integer('status_code');
            $table->string('message', 1000);
            $table->json('data');
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
        Schema::dropIfExists('system_error_logs');
    }
};
