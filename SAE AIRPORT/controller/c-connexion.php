<?php

function connexion()
{
    $errmess = ConnectUser();

    require_once('vue/inc/inc.head.php');
    require_once('vue/inc/inc.header.php');
    require_once('vue/v-connexion.php');
    require_once('vue/inc/inc.footer.php');
}

    function ConnectUser()
    {
        global $bdd;
        $postData = $_POST;
        $errorMessage = null;
        $loggedUser = null;

        // Validation du formulaire
        if (isset($postData['email']) && isset($postData['password'])) {
            if (!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
                $errorMessage = 'Il faut un email valide pour soumettre le formulaire.';
            } else {
                $stmt = $bdd->prepare('SELECT * FROM users WHERE email = :email');
                $stmt->execute(['email' => $postData['email']]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($postData['password'], $user['password_hash'])) {
                    $_SESSION['loggedUser'] = [
                        'email' => $user['email'],
                        'fname' => $user['first_name'],
                        'lname' => $user['last_name'],
                        'created' => $user['created_at'],
                        'role' => $user['id_role']

                    ];
                    header('Location: /accueil'); // Redirection vers l'accueil
                    exit;
                } else {
                    return 'Les informations envoyées ne permettent pas de vous identifier';
                }
            }
        }


}
