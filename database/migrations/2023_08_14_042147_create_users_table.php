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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('name');
            $table->string('slug');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('register_token')->nullable();
            $table->text('image')->nullable();
            $table->enum('employee_group', ['Bulanan', 'Harian'])->nullable();
            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('restrict');
            $table->bigInteger('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('restrict');
            $table->date('join_date')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->date('start_work_date')->nullable();
            $table->boolean('approved')->default(0)->comment('0 = Not Yet Approved, 1 = Approved, 2 = Rejected');
            $table->timestamp('approved_at')->nullable();
            $table->string('approved_by')->nullable();
            $table->float('simpanan_pokok', 8, 2)->default(0);
            $table->float('simpanan_wajib', 8, 2)->default(0);
            $table->float('simpanan_sukarela', 8, 2)->default(0);
            $table->float('simpanan_sukarela_tetap', 8, 2)->default(0);
            $table->boolean('status')->default(0)->comment('1 = Active, 0 = Inactive');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamp('restored_at')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->string('restored_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
