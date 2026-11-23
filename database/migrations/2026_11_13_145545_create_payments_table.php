
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->foreignId('student_id')
                ->nullable()
                ->constrained('students')
                ->cascadeOnDelete();

            $table->decimal('amount', 10, 2)->default(0);

            $table->string('payment_method')->nullable();

            $table->string('transaction_reference')->nullable();

            $table->date('payment_date')->nullable();

            $table->string('status')->default('pending');
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);

            $table->dropColumn([
                'student_id',
                'amount',
                'payment_method',
                'transaction_reference',
                'payment_date',
                'status',
            ]);
        });
    }
};
