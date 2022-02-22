<?php
$users = new users;
$formErrors = [];
$users->id = $_SESSION['user']->id;

if (count($_POST) > 0) {

    if (!empty($_POST['deleteUser'])) {
        $users->deleteUser();
        header('Location: signOut.php');
        exit;
    }
}

$user = $users->getUser();

if (count($_FILES) > 0) {
    if ($_FILES['myAccountProfilImage']['error'] == 0) {
        $fileinfos = pathinfo($_FILES['myAccountProfilImage']['name']);
        $photoExtension = strtolower($fileinfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
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
    } else {
        $users->profilePicture = $_SESSION['user']->profilePicture;
    }

    if (count($formErrors) == 0) {
        if ($users->updateUserImg()) {
            $_SESSION['user']->profilePicture = $users->profilePicture;
        }
    }
}

if (isset($_POST['email'])) {

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE)) {
            $users->email = $_POST['email'];
            if ($users->emailExist() > 0 && $_POST['email'] != $_SESSION['user']->email) {
                $formErrors['email'] = MAIL_ERROR_EXIST;
            }
        } else {
            $formErrors['email'] = MAIL_ERROR_INVALID;
        }
    } else {
        $users->email = $_SESSION['user']->email;
    }

    if (count($formErrors) == 0) {
        $users->updateUserEmail();
        $_SESSION['user']->email = $users->email;
    }
}

if (isset($_POST['Username'])) {

    if (!empty($_POST['Username'])) {
        if (preg_match($regex['userName'], $_POST['Username'])) {
            $users->userName = strip_tags($_POST['Username']);
            if ($users->userNameExist() > 0 && $_POST['Username'] != $user->userName) {
                $formErrors['Username'] = USERNAME_ERROR_EXIST;
            }
        } else {
            $formErrors['Username'] = USERNAME_ERROR_INVALID;
        }
    } else {
        $users->userName = $_SESSION['user']->userName;
    }

    if (count($formErrors) == 0) {
        $users->updateUser();
        $_SESSION['user']->userName = $users->userName;
    }
}
