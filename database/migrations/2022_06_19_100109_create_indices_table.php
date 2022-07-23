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
        Schema::create('indices', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('name');
            $table->integer('id_wp');
            $table->enum('refine', ['5', '6', '7']);
            $table->enum('type', ['dress', 'weapon', 'badge', 'pet']);
            $table->enum('weapon_type', ['melee', 'pistol', 'throw', 'spray', 'dolly', 'depoy', 'sniper', 'bow', 'shotgun', 'rocket', 'rifle'])->nullable();
            $table->enum('weapon_element', ['electric', 'ice', 'fire', 'phisical', 'energy', 'poison'])->nullable();
            $table->enum('awaken', ['awaken', 'non_awaken']);
            $table->enum('label', ['meta', 'keep', 'lebur']);
            $table->enum('dismantle', ['yes', 'no']);
            $table->string('skill_1');
            $table->string('skill_1_desc');
            $table->string('skill_2');
            $table->string('skill_2_desc');
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
        Schema::dropIfExists('indexs');
    }
};
