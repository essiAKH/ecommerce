@extends('layouts.admin')

@section('content')
<h2>Modifier le produit</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="pro_name">Nom du produit</label>
    <input type="text" name="pro_name" id="pro_name" value="{{ $product->pro_name }}" required>

    <label for="pro_price">Prix</label>
    <input type="number" step="0.01" name="pro_price" id="pro_price" value="{{ $product->pro_price }}" required>

    <label for="categories_id">Catégorie</label>
    <select name="categories_id" id="categories_id" required>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ $product->categories_id == $category->id ? 'selected' : '' }}>
                {{ $category->cat_name }}
            </option>
        @endforeach
    </select>

    <label for="pro_desc">Description</label>
    <textarea name="pro_desc" id="pro_desc">{{ $product->pro_desc }}</textarea>

    <button type="submit">Mettre à jour</button>
</form>
@endsection
