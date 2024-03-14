<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->boolean('is_free');
            $table->string('stripe_id')->nullable();
            $table->unsignedBigInteger('storage');
            $table->timestamps();
        });

        DB::table('plans')->insert([
            ["name"=>"Gratis","slug"=>"gratis","price"=>0,"is_free"=>true,"stripe_id"=>null,"storage"=>10485760],
            ["name"=>"Plata","slug"=>"plata","price"=>500,"is_free"=>false,"stripe_id"=>"price_1OkmtqFPg3RUUC1kxuMSml62","storage"=>20971520],
            ["name"=>"Oro","slug"=>"oro","price"=>1000,"is_free"=>false,"stripe_id"=>"price_1OkmtZFPg3RUUC1k1SJgvsLn","storage"=>31457280]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
