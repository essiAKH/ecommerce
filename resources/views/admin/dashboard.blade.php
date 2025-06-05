@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tableau de bord - Admin</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 max-w-2xl mx-auto">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- SECTION 1 : STATISTIQUES RAPIDES --}}
        <section class="col-span-1 md:col-span-2 lg:col-span-3">
            <h2 class="text-xl font-bold mb-2">Statistiques rapides</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="card bg-white p-4 rounded shadow">
                    Ventes totales : <strong>{{ $totalSales ?? '0 €' }}</strong>
                </div>
                <div class="card bg-white p-4 rounded shadow">
                    Commandes : <strong>{{ $totalOrders ?? 0 }}</strong>
                </div>
                <div class="card bg-white p-4 rounded shadow">
                    Produits en stock : <strong>{{ $productsInStock ?? 0 }}</strong>
                </div>
                <div class="card bg-white p-4 rounded shadow">
                    Utilisateurs : <strong>{{ $totalUsers ?? 0 }}</strong>
                </div>
            </div>
        </section>

        {{-- SECTION 2 : PROFIL ADMIN --}}
        <section class="max-w-sm">
            <h2 class="text-xl font-bold mb-2">Mon profil</h2>
            <div class="bg-white p-4 rounded shadow">
                <p>Nom : {{ Auth::user()->firstname }}</p>
                <p>Email : {{ Auth::user()->email }}</p>
                <div class="mt-4">
                    <!-- <a href="{{ route('admin.profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded mr-2">Modifier mes informations</a> -->
                    <form action="{{ route('admin.profile.delete') }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre compte ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Supprimer mon compte</button>
                    </form>
                </div>
            </div>
        </section>

        {{-- SECTION 3 : GESTION DES CATÉGORIES --}}
        <section class="max-w-sm">
            <h2 class="text-xl font-bold mb-2">Catégories</h2>
            <div class="bg-white p-4 rounded shadow">
                <!-- <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mr-2">Ajouter une catégorie</a> -->
                <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Gérer les catégories</a>
            </div>
        </section>

        {{-- SECTION 4 : GESTION DES PRODUITS (COMMENTÉE) --}}
        {{--<section class="max-w-sm">
            <h2 class="text-xl font-bold mb-2">Produits</h2>
            <div class="bg-white p-4 rounded shadow">
                <!-- <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mr-2">Ajouter un produit</a> -->
                <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Voir tous les produits</a>
            </div>
        </section>--}}

        {{-- SECTION 5 : GESTION DES UTILISATEURS (COMMENTÉE) --}}
        {{-- <section class="max-w-sm">
            <h2 class="text-xl font-bold mb-2">Utilisateurs</h2>
            <div class="bg-white p-4 rounded shadow">
                <a href="{{ route('admin.users.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Voir tous les utilisateurs</a>
            </div>
        </section> --}}
    </div>
@endsection