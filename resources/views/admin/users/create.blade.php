@extends('layouts.admin')

@section('content')
<h2>Ajouter un utilisateur</h2>

<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Ajouter</button>
</form>
@endsection
