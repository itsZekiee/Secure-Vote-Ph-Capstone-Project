<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('election_form_2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form1_id')->constrained('election_form_1')->onDelete('cascade');
            $table->string('position');
            $table->json('candidates'); // store candidates as JSON array
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('election_form_2');
    }
};

