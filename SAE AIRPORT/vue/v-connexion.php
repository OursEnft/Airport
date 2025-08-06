<div class="container" id="containerconnexion">
    <div class="row">
        <h2 class="titre">Accès client</h2>
        <!-- Formulaire de connexion (côté gauche) -->
        <div class="col-md-6">
            <div class="card p-4"  id="carteconnexiong">
                <h2>Connexion</h2>

                <!-- Si un message d'erreur existe, on l'affiche -->
                <?php if (isset($errmess)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $errmess; ?>
                    </div>
                <?php endif; ?>

                <form method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@exemple.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>

        <!-- Lien d'inscription (côté droit) -->
        <div class="col-md-6">
            <div class="card p-4">
                <h3>Pas de compte ?</h3>
                <p>
                    La création d’un compte a de nombreux avantages : consultation rapide, sauvegarder plusieurs adresses, suivre les commandes, et bien plus encore.
                    <a href="/inscription" class="btn btn-primary">Inscription</a>
                </p>
            </div>
        </div>
    </div>
</div>
