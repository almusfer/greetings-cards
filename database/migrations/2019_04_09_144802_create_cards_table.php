<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('event_id');
            $table->string('url');
            $table->integer('positionX')->nullable();
            $table->integer('positionY')->nullable();
            $table->string('text_color')->nullable();
            $table->integer('font_size')->nullable();
            $table->integer('font_id')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        \App\Card::create([
            'event_id' => 1,
            'url' => 'uploads/cards/card-198758272.png',
            'positionX' => 1130,
            'positionY' => 440,
            'text_color' => '#ffffff',
            'font_size' => 45,
            'font_id' => 1,
            'active' => true,
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
}
