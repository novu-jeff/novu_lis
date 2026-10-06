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
        Schema::create('document_remarks', function (Blueprint $table) {

            $table->id();
        
            $table->unsignedBigInteger('document_id');

            $table->unsignedBigInteger('parent_id')->nullable();
        
            $table->unsignedBigInteger('member_account_id');
        
            $table->text('remark');
        
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_remarks');
    }
};
