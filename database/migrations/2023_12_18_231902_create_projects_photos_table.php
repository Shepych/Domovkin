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
        Schema::create('projects_photos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->string('src');

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
        Schema::dropIfExists('projects_photos');
    }
};
