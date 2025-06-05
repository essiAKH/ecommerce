<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <nav class="bg-white p-4 rounded shadow mb-4 flex justify-between items-center">
            <!-- Lien Tableau de bord à gauche -->
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 font-bold">Tableau de bord</a>
            </div>
            <!-- Liens Catégories, Profil, Déconnexion à droite -->
            <div class="space-x-4">
                <a href="{{ route('admin.categories.index') }}" class="text-blue-600">Catégories</a>
                <a href="{{ route('admin.products.index') }}" class="text-blue-600">Produits</a>
                <a href="{{ route('admin.profile.edit') }}" class="text-blue-600">Profil</a>
                <a href="{{ route('logout') }}" class="text-red-600">Déconnexion</a>
            </div>
        </nav>
        @yield('content')
    </div>
</body>
</html>