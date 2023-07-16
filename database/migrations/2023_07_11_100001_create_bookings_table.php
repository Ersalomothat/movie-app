<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('showtime_id')
                ->constrained('showtimes')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('ids_seats',128);
            $table->timestamp('booking_date');
            $table->string('status')->default(\App\Enum\StatusBooking::PENDING->value);// 'paid // 'canceled
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
