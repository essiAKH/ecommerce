@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Modifier la catégorie</h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="cat_name" class="block text-gray-700">Nom</label>
            <input type="text" name="cat_name" id="cat_name" class="w-full border rounded p-2" value="{{ $category->cat_name }}" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
        <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Annuler</a>
    </form>
@endsectionphp artisan