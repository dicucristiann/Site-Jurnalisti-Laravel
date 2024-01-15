<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new wclass extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // equivalent to INT NOT NULL PRIMARY KEY AUTO_INCREMENT
            $table->string('title', 255); // equivalent to VARCHAR(255) NOT NULL
            $table->unsignedBigInteger('author_id'); // INT NOT NULL
            $table->text('content'); // TEXT NOT NULL
            $table->string('category', 50); // VARCHAR(50) NOT NULL
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            $table->enum('status', ['waiting', 'approved', 'rejected'])->default('waiting'); // ENUM with default value
            $table->text('status_message')->nullable(); // TEXT, nullable

            // Foreign key constraint
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
