@extends('layouts.admin')

@section('content')
<h2>Liste des utilisateurs</h2>

<a href="{{ route('admin.users.create') }}">➕ Ajouter un utilisateur</a>

<table>
    <tr>
        <th>Nom</th><th>Email</th><th>Actions</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td><td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}">Modifier</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Supprimer ?')" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
