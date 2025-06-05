@extends('layouts.admin')

@section('content')
<h2>Liste des produits</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<a href="{{ route('products.create') }}">➕ Ajouter un produit</a>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->pro_name }}</td>
                <td>{{ $product->pro_price }} FCFA</td>
                <td>{{ $product->category->cat_name ?? 'Non catégorisé' }}</td>
                <td>{{ $product->pro_desc }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">✏️ Modifier</a> |
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Confirmer la suppression ?')">🗑️ Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Aucun produit enregistré.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
