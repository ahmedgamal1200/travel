<?php

use App\Models\Service;
use App\Models\Tour;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('rating'); // التقييم من خمسة
            $table->string('review');
            $table->timestamps();

//            $table->foreignIdFor(Service::class)
//                ->nullable()
//                ->constrained()
//                ->cascadeOnDelete();
//            $table->foreignIdFor(Tour::class)
//                ->nullable()
//                ->constrained()
//                ->cascadeOnDelete();
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
