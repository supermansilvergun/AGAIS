<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->string('second_last_name')->nullable();
            $table->integer('document_id');
            $table->string('identification')->unique();
            $table->string('address');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('municipality_id');
            $table->integer('parish_id');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('backup_phone')->nullable();
            $table->date('birthday_date');
            $table->string('avatar')->default('avatar.png')->nullable();
            $table->date('hire_date');
            $table->char('gender', 1);
            $table->integer('company_id');
            $table->float('wage')->nullable();
            $table->string('url')->unique();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
