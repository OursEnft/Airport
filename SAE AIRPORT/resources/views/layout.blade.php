<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Inclusion du fichier head (ici, tu peux inclure la balise meta charset, etc.) -->
    @include('partials.head')

    <!-- Appel global du fichier CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Lien vers Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<!-- Inclusion du header -->
@include('partials.header')

<!-- Contenu principal -->
<main>
    @yield('content')
    @yield('scripts')

</main>

<!-- Inclusion du footer -->
@include('partials.footer')

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
