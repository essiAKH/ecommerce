@extends('layouts.admin')

@section('content')
<h2>Modifier l'utilisateur</h2>

<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $user->name }}" required>
    <input type="email" name="email" value="{{ $user->email }}" required>
    <button type="submit">Mettre à jour</button>
</form>
@endsection
