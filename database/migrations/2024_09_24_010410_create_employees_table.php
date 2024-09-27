<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile_number');
            $table->string('email')->unique();
            $table->text('address');
            $table->string('pincode');
            $table->integer('age');
            $table->string('blood_group');
            $table->string('previous_company_name');
            $table->string('job_role');
            $table->decimal('salary', 10, 2);
            $table->integer('experience_days');
            $table->string('job_location');
            $table->text('job_description');
            $table->string('employee_designation');
            $table->decimal('gross_salary_in_hand', 10, 2);
            $table->decimal('yearly_mediclaim', 10, 2);
            $table->decimal('pf', 10, 2);
            $table->decimal('ta', 10, 2);
            $table->decimal('hra', 10, 2);
            $table->decimal('joining_bonus', 10, 2);
            $table->decimal('total_monthly_salary', 10, 2);
            $table->string('total_project_name');
            $table->string('team_leader');
            $table->integer('total_group_members');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
