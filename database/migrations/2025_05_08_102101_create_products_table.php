<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Clé primaire auto-incrémentée
            $table->string('pro_name', 45); // Nom du produit
            $table->integer('pro_price'); // Prix du produit
            $table->string('pro_desc', 255); // Description du produit
            $table->timestamps(); // Colonnes created_at et updated_at

            // Clé étrangère vers la table categories
            $table->unsignedBigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');

            // Clé étrangère vers la table users
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
