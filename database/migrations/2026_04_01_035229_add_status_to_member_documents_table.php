<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('member_documents', function (Blueprint $table) {

            $table->unsignedBigInteger('member_id')->after('member_account_id');
        
            $table->string('title')->after('member_id');
        
            $table->text('description')->nullable()->after('title');
        
            $table->enum('status', [
                'draft',
                'forwarded',
                'approved',
                'rejected'
            ])->default('draft')->after('file_path');
        
            $table->foreign('member_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('member_documents', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
