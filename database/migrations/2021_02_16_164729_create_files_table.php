<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('style')->nullable();
            $table->string('retail')->nullable();
            $table->bigInteger('upc')->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->decimal('total_wholesale', 8, 2)->nullable();
            $table->decimal('total_cost', 8, 2)->nullable();
            $table->date('sales')->nullable();
            $table->date('sell_through')->nullable();
            $table->integer('ranking')->nullable();
            $table->string('season')->nullable();
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
