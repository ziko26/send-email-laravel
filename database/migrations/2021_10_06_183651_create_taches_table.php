<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')
            ->nullable()
            ->default(null)
            ->references('id')
            ->on('taches');
        $table->string('titre');
        $table->date('due_time');
        $table->boolean('status')
            ->default(false)
            ->comment('0=Pending, 1=Completed');
        $table->softDeletes();
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
        Schema::dropIfExists('taches');
    }
}
