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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // Definizione della colonna "lastname", di tipo stringa, con una lunghezza massima di 32 caratteri e consentendo valori nulli // stessa cosa gli altri campi
            $table->string('lastname', 32)->nullable();
            $table->string('phone', 16)->nullable();
            $table->string('province', 32)->nullable();
            // Definizione della colonna "age," di tipo smallInteger senza segno, con una lunghezza massima di 2 byte e non consentendo valori nulli
            // false perchè non vogliamo che si autoincrementi e true per dire che è unsigned (perchè un'età è sempre positiva)
            $table->smallInteger('age', false, true)->nullable(); // AVEVAMO DIMENTICATO NULLABLE <----------------------------
            // <---------------------------- <---------------------------- <----------------------------
            // <---------------------------- <---------------------------- <----------------------------
            // <---------------------------- <---------------------------- <----------------------------
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
