<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('code')->unique();
            $table->string('identity')->unique();
            $table->string('email')->unique();
            $table->string('backup_email')->nullable();
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('municipality_id');
            $table->integer('parish_id');
            $table->string('phone');
            $table->string('backup_phone')->nullable();
            $table->string('address');
            $table->string('number_apartment')->unique();
            $table->char('family_boss');
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
