<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

    <h2>Inscription</h2>
            @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Nom</label><br>
        <input type="text" name="firstname" placeholder="Nom"required><br><br>

        <label>Prénom</label><br>
        <input type="text" name="lastname" placeholder="Prenom"required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email"required><br><br>

        <label>Mot de passe</label><br>
        <input type="password" name="password" placeholder="Mot de passe"required><br><br>

        <label>Confirmer le mot de passe</label><br>
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe"required><br><br>

        <label>Rôle</label><br>
        <select name="roles_id" required>
            <option value="1">Admin</option>
            <option value="2">Client</option>
        </select><br><br>

        <button type="submit">S'inscrire</button>
    </form>

    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>

</body>
</html>
