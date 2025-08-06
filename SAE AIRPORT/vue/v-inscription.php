<div class="containerinscription">
    <form class="row" method="post">
        <div class="infosinscription">
            <h3>Inscription</h3>

            <div class="form-row">
                <div class="form-group">
                    <input type="text" id="idnom" name="nom" placeholder=" " required>
                    <label class="lblinput" for="idnom">Nom</label>
                </div>

                <div class="form-group">
                    <input type="text" id="idprenom" name="prenom" placeholder=" " required>
                    <label class="lblinput" for="idprenom">Prénom</label>
                </div>
            </div>

            <div class="form-group">
                <input type="email" id="idemail" name="email" placeholder=" " required>
                <label class="lblinput" for="idemail">Email</label>
            </div>

            <div class="form-group">
                <input type="password" id="idpassword" name="password" placeholder=" " required>
                <label class="lblinput" for="idpassword">Mot de passe</label>
            </div>

            <div class="form-group">
                <input type="password" id="idconfirmpassword" name="confirm_password" placeholder=" " required>
                <label class="lblinput" for="idconfirmpassword">Confirmer le mot de passe</label>
            </div>
        </div>

        <div class="form-group">
            <button class="button" id="btnvalider" type="submit">S'inscrire</button>
        </div>
    </form>
</div>