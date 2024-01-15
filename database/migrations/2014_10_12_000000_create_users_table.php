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
            $table->string('prenom');
            $table->date('date_naissance')->default(now());
            $table->enum('sexe', ['male', 'female']);
            $table->string('ville')->nullable(true);
            $table->string('adresse')->nullable(true);
            $table->integer('code_postale')->nullable(true);
            $table->string('pays')->nullable(true);
            $table->string('cin');
            $table->tinyInteger('role')->default(0); // 0 normal user / 1 prof /2 chef filiere / 3 chef departement / 4 chef_service
            $table->string('numero_telephone');

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
