<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
   
    <h2>Connexion</h2>
            @if (session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif


    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email"required><br><br>

        <label>Mot de passe</label><br>
        <input type="password" name="password" placeholder="Mot de passe"required><br><br>

        <button type="submit" class="btn">Connexion</button>
    </form>

    <p>Pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a></p>
        

</body>
</html>
