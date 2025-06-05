@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Ajouter une catégorie</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="cat_name" class="block text-gray-700">Nom de la catégorie</label>
            <input type="text" name="cat_name" id="cat_name" class="w-full border rounded p-2" value="{{ old('cat_name') }}" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Enregistrer</button>
    </form>
@endsection