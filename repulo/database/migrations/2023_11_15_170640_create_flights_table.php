<?php

use App\Models\Flight;
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
        Schema::create('flights', function (Blueprint $table) {
            $table->id('flight_id');
            $table->date('date');
            $table
                ->foreignId('airline_id')
                ->references('airline_id')
                ->on('airlines');
            $table->integer('limit')->default(150);
            $table->timestamps();
        });

        Flight::create([
            'date' => "2024-02-11",
            'airline_id' => 1,
            'limit' => 150
        ]);

        Flight::create([
            'date' => "2024-02-14",
            'airline_id' => 1,
            'limit' => 150
        ]);

        Flight::create([
            'date' => "2024-02-11",
            'airline_id' => 2,
            'limit' => 150
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
