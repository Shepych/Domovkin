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
        Schema::create('telegram_applications', function (Blueprint $table) {
            $table->id();

            $table->text('user_id');
            $table->text('name')->nullable();
            $table->text('phone')->nullable();
            $table->text('description')->nullable();
            $table->boolean('reviewed')->default(0);

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
        Schema::dropIfExists('table_telegram_applications');
    }
};
