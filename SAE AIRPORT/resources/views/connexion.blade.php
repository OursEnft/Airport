@extends('layout')

@section('title', 'Connexion')

@section('content')
    <div class="container" id="containerconnexion">
        <div class="row">
            <h2 class="titre">Accès client</h2>
            <!-- Formulaire de connexion (côté gauche) -->
            <div class="col-md-6">
                <div class="card p-4"  id="carteconnexion">
                    <h2>Connexion</h2>

                    <!-- Si un message d'erreur existe, on l'affiche -->
                    <?php if (isset($errmess)) : ?>
                    <div class="alert alert-danger" role="alert">
                            <?php echo $errmess; ?>
                    </div>
                    <?php endif; ?>

                    <form action="/user" method="POST">
                        <p>Si vous avez un compte, connectez-vous avec votre adresse mail.</p>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="you@exemple.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <button type="button" class="btn btn-outline-secondary toggle-password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Connexion</button>
                        <a href="/forgot-password" class="d-block mt-3 text-center text-decoration-none">Mot de passe oublié ?</a>
                    </form>
                </div>
            </div>

            <!-- Lien d'inscription (côté droit) -->
            <div class="col-md-6" >
                <div class="card p-4" id="carteconnexion">
                    <h3>Vous n'avez pas de compte client ?</h3>
                    <p>
                        La création d’un compte a de nombreux avantages : consultation rapide, sauvegarder plusieurs adresses, suivre les commandes, et bien plus encore.
                    </p>
                    <a href="/inscription" class="btn btn-primary">Inscription</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const eyeIcon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    </script>

@endsection
