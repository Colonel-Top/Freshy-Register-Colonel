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
            $table->text('name');
            $table->text('surname');
            $table->text('nickname');
            $table->text('gender');
            $table->text('faculty');
            $table->text('telephone');
            $table->text('line')->nullable();
            $table->text('facebook')->nullable();
            $table->text('religion');
            $table->text('disfood');
            $table->boolean('islamic')->default(0);
            $table->boolean('vegetarian')->default(0);
            $table->text('disease');
            $table->text('disdrug');
            $table->text('sosname');
            $table->text('sossurname');
            $table->text('sosrelationship');
            $table->text('sostel1');
            $table->text('sostel2')->nullable();
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
