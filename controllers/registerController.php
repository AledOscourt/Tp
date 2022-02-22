<?php
$formErrors = [];


if (isset($_POST['addUsers'])) {
    $users = new users();
    /**
     * la fonction count sert à compter le nombre d'élément dans un tableaux
     * ici elle à savoir si le formulaire à été envoyer
     */
    if (count($_POST) > 0) {

        if (!empty($_POST['userName'])) {
            if (preg_match($regex['userName'], $_POST['userName'])) {
                $users->userName = strip_tags($_POST['userName']);
                if ($users->userNameExist() > 0) {
                    $formErrors['userName'] = USERNAME_ERROR_EXIST;
                }
            } else {
                $formErrors['userName'] = USERNAME_ERROR_INVALID;
            }
        } else {
            $formErrors['userName'] = USERNAME_ERROR_EMPTY;
        }

        if (!empty($_POST['email'])) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE)) {
                $users->email = $_POST['email'];
                if ($users->emailExist() > 0) {
                    $formErrors['email'] = MAIL_ERROR_EXIST;
                }
            } else {
                $formErrors['email'] = MAIL_ERROR_INVALID;
            }
        } else {
            $formErrors['email'] = MAIL_ERROR_EMPTY;
        }


        if (!empty($_POST['password'])) {
            if (preg_match($regex['password'], $_POST['password'])) {
                if ($_POST['password'] == $_POST['confirmPassword']) {
                    $users->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                } else {
                    $formErrors['password'] = $formErrors['confirmPassword'] = PASSWORD_ERROR_DIFFERENT;
                }
            } else {
                $formErrors['password'] = PASSWORD_ERROR_INVALID;
            }
        } else {
            $formErrors['password'] = PASSWORD_ERROR_EMPTY;
        }
        if (count($formErrors) == 0) {

            if ($users->addUser()) {
                echo  "<script type='text/javascript'>
                Swal.fire(
                    'Bravo,',
                    'Vous êtes inscrit!',
                    'success'
                  )
                    window.setTimeout(function() {
                     window.location = 'connexion';
                    }, 5000);
                </script>";
                $success = 'Votre inscription a bien été prise en compte';

                //Seul endroit où l'on peut mettre du HTML dans du PHP et mise en page en tableau autorisée ;)
                $message = '
                <p>Bonjour ' . $_POST['userName'] . '</p>
                <p>Votre inscription est validé</p>
                ';

                $headers = array(
                    'From' => 'no-reply@maximilien.fr',
                    'MIME-Version' => '1.0',
                    'Content-type' => 'text/html; charset=UTF8'
                );

                //Personne à qui on envoie le mail, l'objet du mail, le contenu du mail, les en-têtes du mail 
                mail($_POST['email'], 'Bienvenue parmi nous', $message, $headers);
            }
        }
    }
}
