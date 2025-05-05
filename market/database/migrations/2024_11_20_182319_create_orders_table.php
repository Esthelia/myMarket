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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Colonne 'id' avec auto-increment et clé primaire
            $table->bigInteger('user_id'); // Colonne user_id (clé étrangère)
            $table->enum('status', ['en attente', 'payée', 'annulée', 'livrée'])->default('en attente'); // Statut ENUM
            $table->string('total'); // Prix total avec 10 chiffres au total, 2 après la virgule
            $table->string('delivery'); // Adresse de livraison (texte long)
            $table->string('delivery_fee'); // Frais de livraison
            $table->timestamps(); // Colonnes created_at et updated_at

            // Ajouter la contrainte de clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
