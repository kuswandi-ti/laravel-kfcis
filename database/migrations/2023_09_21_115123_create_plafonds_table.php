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
        Schema::create('plafonds', function (Blueprint $table) {
            $table->id();
            $table->string('years_of_work');
            $table->integer('level');
            $table->float('warranty', 13, 2)->default(0);
            $table->float('asset', 13, 2)->default(0);
            $table->float('index', 13, 2)->default(0);
            $table->float('max_loan', 13, 2)->default(0);
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
        Schema::dropIfExists('plafonds');
    }
};
