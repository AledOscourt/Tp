<?php
$formErrors = [];
$users = new users();
$users->id = $_SESSION['user']->id;
$user=$users->getUser();

if (count($_POST) > 0) {

    if (!empty($_POST['myAccountUsernameInput'])) {
        if (preg_match($regex['userName'], $_POST['myAccountUsernameInput'])) {
            $users->userName = strip_tags($_POST['myAccountUsernameInput']);
            if ($users->userNameExist() > 0 && $_POST['myAccountUsernameInput']!=$user->userName) {
                $formErrors['myAccountUsernameInput'] = USERNAME_ERROR_EXIST;
            }
        } else {
            $formErrors['myAccountUsernameInput'] = USERNAME_ERROR_INVALID;
        }
    }else{
        $users->userName=$user->userName;
    }


    if (!empty($_POST['myAccountEmailInput'])) {
        if (filter_var($_POST['myAccountEmailInput'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE)) {
            $users->email = $_POST['myAccountEmailInput'];
            if ($users->emailExist() > 0 && $_POST['myAccountEmailInput'] !=$user->email ) {
                $formErrors['myAccountEmailInput'] = MAIL_ERROR_EXIST;
            }
        } else {
            $formErrors['myAccountEmailInput'] = MAIL_ERROR_INVALID;
        }
    }else{
        $users->email= $user->email;
    }

    

    if (count($formErrors) == 0) {
        $users->updateUser();
        header('Location: Profil');
        exit;
    }
}
