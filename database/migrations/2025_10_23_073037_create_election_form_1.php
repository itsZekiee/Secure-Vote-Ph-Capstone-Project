<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('election_form_1', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('organization', 100);
            $table->string('category')->nullable();
            $table->text('description');
            $table->text('instructions')->nullable();
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('election_form_1');
    }
};

