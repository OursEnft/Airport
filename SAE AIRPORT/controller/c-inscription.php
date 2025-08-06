<?php

function inscription()
{
    AjoutUtilisateur();

    require_once('vue/inc/inc.head.php');
    require_once('vue/inc/inc.header.php');
    require_once('vue/v-inscription.php');
    require_once('vue/inc/inc.footer.php');
}

function AjoutUtilisateur()
{
    global $bdd;

    // Vérifie que les champs requis sont remplis
    if (isset($_POST['nom']) && $_POST['nom'] &&
        isset($_POST['prenom']) && $_POST['prenom'] &&
        isset($_POST['email']) && $_POST['email'] &&
        isset($_POST['password']) && $_POST['password'] &&
        isset($_POST['confirm_password'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $hashedPassword = hashPassword($password);

        $stmt = $bdd->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            echo "Cet email est déjà utilisé.";
            return;
        }



        $data = json_decode($hashedPassword, true);
        $salt = $data['salt'];
        $hash = $data['hash'];
        $iterations = $data['iterations'];

        $stmt = $bdd->prepare('INSERT INTO users (first_name,last_name, email, password_hash, password_salt, iterations,created_at, updated_at,id_role) VALUES (:prenom, :nom, :email, :password, :salt, :iterations, NOW(), NOW(),:id_role)');
        $stmt->execute([
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'password' => $hash,
            'salt' => $salt,
            'iterations' => $iterations,
            'id_role' => 2
        ]);

        header('Location: ../connexion');
        exit();

    }
}

// Fonction de hachage avec une méthode KDF
function hashPassword($password)
{
    // Nombre d'itérations pour la méthode PBKDF2
    $iterations = 150000;

    // Générer un salt sécurisé
    $salt = bin2hex(random_bytes(16)); // 16 octets (32 caractères hexadécimaux)

    // Hachage du mot de passe avec PBKDF2
    $hash = hash_pbkdf2(
        'sha512',  // Algorithme de hachage
        $password,
        $salt,
        $iterations,
        128
    );

    if ($hash === false) {
        throw new Exception("Erreur lors du chiffrement du mot de passe avec PBKDF2.");
    }

    // Retourner les données nécessaires pour la vérification
    return json_encode([
        'salt' => $salt,
        'hash' => $hash,
        'iterations' => $iterations
    ]);
}

