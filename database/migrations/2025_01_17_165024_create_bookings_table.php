
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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('payment_slip');
            $table->string('status');
            $table->text('note');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')
            ->references('id')
            ->on('packages')
            ->onDelete('cascade');
            $table->unsignedBigInteger('payment_id');
            $table->foreign('payment_id')
            ->references('id')
            ->on('payments')
            ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};

