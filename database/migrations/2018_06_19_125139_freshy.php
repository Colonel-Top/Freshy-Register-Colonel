<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class Freshy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freshies', function (Blueprint $table) {
            $table->increments('id');
            //'','','','','','','','',
            $table->string('name');
            $table->string('surname');
            $table->string('nickname');
            $table->string('gender');
            $table->string('faculty');
            $table->string('telephone');
            $table->string('line')->nullable();
            $table->string('facebook')->nullable();
            $table->string('religion');
            $table->string('disfood');
            $table->boolean('islamic')->default(0);
            $table->boolean('vegetarian')->default(0);
            $table->string('disease');
            $table->string('disdrug');
            $table->string('sosname');
            $table->string('sossurname');
            $table->string('sosrelationship');
            $table->string('sostel1');
            $table->string('sostel2')->nullable();
            $table->timestamps();
        });
        DB::update("ALTER TABLE freshies AUTO_INCREMENT = 1001;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freshies');
    }
}
