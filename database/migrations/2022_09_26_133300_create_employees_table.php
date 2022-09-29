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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->unsigned();
            $table->unsignedBigInteger('department_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('birthday');
            $table->string('number');
            $table->text('address');
            $table->string('position');
            $table->enum('gender',['male','female']);
            $table->timestamps();
            $table->boolean('has_license')->default(0);
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade') ;
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade') ;
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
};
