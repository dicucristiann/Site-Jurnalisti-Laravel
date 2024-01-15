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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // equivalent to INT NOT NULL PRIMARY KEY AUTO_INCREMENT
            $table->string('username', 50)->unique(); // equivalent to VARCHAR(50) NOT NULL UNIQUE
            $table->string('password', 255); // equivalent to VARCHAR(255) NOT NULL
            $table->timestamp('created_at')->useCurrent(); // equivalent to DATETIME DEFAULT CURRENT_TIMESTAMP
            $table->enum('role', ['editor', 'journalist', 'reader']); // ENUM type
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
