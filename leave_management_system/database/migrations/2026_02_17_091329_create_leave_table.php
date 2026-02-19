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
          Schema::create('leave', function (Blueprint $table) { 
        $table->id(); 
        $table->string('employee_name'); 
        $table->enum('type', ['Sick', 'Casual', 'Vacation']); 
        $table->date('start_date'); 
        $table->date('end_date'); 
        $table->text('reason'); 
        $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending'); 
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
        Schema::dropIfExists('leave');
    }
};
