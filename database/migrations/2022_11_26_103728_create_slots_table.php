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
        Schema::create('slots', function (Blueprint $table) {
            $table->id();
            $table->string('slot_name', 355);
            $table->string('slot_time', 255);
            $table->double('slot_price_first_step', 8, 2)->nullable(); // Changed to double(8,2)
            $table->double('slot_price', 8, 2)->comment('second step price'); // Changed to double(8,2)
            $table->date('slot_date');
            $table->string('speaker', 355)->nullable();
            $table->longText('description')->nullable();
            $table->integer('slot_seats');
            $table->string('workshop', 100)->nullable(); // New column workshop
            $table->longText('topic_desc')->nullable(); // New column topic_desc
            $table->string('type', 20)->nullable()->comment('Premium or Advanced'); // New comment for type column
            $table->timestamps();

            // $table->id();
            // $table->string('slot_name', '355');
            // $table->string('slot_time', '255');
            // $table->float('slot_price');
            // $table->date('slot_date');
            // $table->string('speaker', '355')->nullable();
            // $table->longText('description')->nullable();
            // $table->integer('slot_seats');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slots');
    }
};
