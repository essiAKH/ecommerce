@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Modifier le profil</h1>
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="firstname" class="block text-gray-700">Prénom</label>
            <input type="text" name="firstname" id="firstname" class="w-full border rounded p-2" value="{{ old('firstname', $user->firstname) }}" required>
        </div>
        <div class="mb-4">
            <label for="lastname" class="block text-gray-700">Nom</label>
            <input type="text" name="lastname" id="lastname" class="w-full border rounded p-2" value="{{ old('lastname', $user->lastname) }}" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Nouveau mot de passe (facultatif)</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2">
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded p-2">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Mettre à jour</button>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded">Annuler</a>
    </form>
@endsection