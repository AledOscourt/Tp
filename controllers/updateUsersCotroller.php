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

    if ($_FILES['myAccountProfilImage']['error'] == 0) {
        $fileinfos = pathinfo($_FILES['myAccountProfilImage']['name']);
        $photoExtension = strtolower($fileinfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
        ];
        if (array_key_exists($photoExtension, $authorizedMimeTypes) && mime_content_type($_FILES['myAccountProfilImage']['tmp_name']) == $authorizedMimeTypes[$photoExtension]) {
            if (move_uploaded_file($_FILES['myAccountProfilImage']['tmp_name'], 'uploads/' . $_FILES['myAccountProfilImage']['name'])) {
                chmod('uploads/' . $_FILES['myAccountProfilImage']['name'], 0644);
                $users->profilePicture = 'uploads/' . $_FILES['myAccountProfilImage']['name'];
            } else {
                $formErrors['myAccountProfilImage'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['myAccountProfilImage'] = 'Veuillez selectionner une image.';
        }
    }else{
        $users->profilePicture=$user->profilePicture;
    }

    if (count($formErrors) == 0) {
        $users->updateUser();
        $_SESSION['user']->profilePicture = $users->profilePicture;
        header('Location: Profil');
        exit;
    }
}
