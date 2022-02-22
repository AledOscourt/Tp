<?php

if (count($_POST) > 0) {

    $formErrors = [];

    $user = new users;

    if (!empty($_POST['email'])) {
        $user->email = $_POST['email'];
        if ($user->checkIfUserExist()) {
            $hash = $user->getPasswordByEmail();
        } else {
            $formErrors['email'] = $formErrors['password'] = LOGIN_ERROR_INVALID;
        }
    } else {
        $formErrors['email'] = MAIL_ERROR_EMPTY;
    }

    if (!empty($_POST['password'])) {
        if (isset($hash)) {
            if (password_verify($_POST['password'], $hash->password)) {
                $_SESSION['user'] = $user->getUserbyMail();
                $_SESSION['user']->email=$_POST['email'];
                header('Location: Accueil');
                exit;
            } else {
                $formErrors['email'] = $formErrors['password'] = LOGIN_ERROR_INVALID;
            }
        }
    } else {
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
    }
}
