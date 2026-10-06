<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('member_documents', function (Blueprint $table) {

            $table->text('remarks')->nullable()->after('status');

            $table->unsignedBigInteger('session_id')
                ->nullable()
                ->after('remarks');

            $table->integer('agenda_order')
                ->nullable()
                ->after('session_id');

        });
    }

    public function down(): void
    {
        Schema::table('member_documents', function (Blueprint $table) {

            $table->dropColumn([
                'remarks',
                'session_id',
                'agenda_order'
            ]);

        });
    }
};
