<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'kyc_status')) {
                $table->enum('kyc_status', ['pending', 'verified', 'rejected', 'not_submitted'])->default('not_submitted')->after('referral_code');
            }
            if (!Schema::hasColumn('users', 'kyc_document_front')) {
                $table->string('kyc_document_front')->nullable()->after('kyc_status');
            }
            if (!Schema::hasColumn('users', 'kyc_document_back')) {
                $table->string('kyc_document_back')->nullable()->after('kyc_document_front');
            }
            if (!Schema::hasColumn('users', 'kyc_document_type')) {
                $table->string('kyc_document_type')->nullable()->after('kyc_document_back');
            }
            if (!Schema::hasColumn('users', 'kyc_submitted_at')) {
                $table->timestamp('kyc_submitted_at')->nullable()->after('kyc_document_type');
            }
            if (!Schema::hasColumn('users', 'kyc_verified_at')) {
                $table->timestamp('kyc_verified_at')->nullable()->after('kyc_submitted_at');
            }
            if (!Schema::hasColumn('users', 'kyc_rejection_reason')) {
                $table->text('kyc_rejection_reason')->nullable()->after('kyc_verified_at');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'kyc_status',
                'kyc_document_front',
                'kyc_document_back',
                'kyc_document_type',
                'kyc_submitted_at',
                'kyc_verified_at',
                'kyc_rejection_reason'
            ]);
        });
    }
};