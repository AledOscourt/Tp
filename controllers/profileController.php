<?php
$users = new users;
$offer = new offers();
$opinion = new opinions();
$status = new status();
$formErrors = [];
$users->id = $_SESSION['user']->id;
$user = $users->getUser();

if (isset($_FILES['myAccountProfilImage'])) {
    if ($_FILES['myAccountProfilImage']['error'] == 0) {
        $fileinfos = pathinfo($_FILES['myAccountProfilImage']['name']);
        $photoExtension = strtolower($fileinfos['extension']);
        $authorizedMimeTypes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
        ];
        $lastAvatar = $_SESSION['user']->profilePicture;
        unlink($lastAvatar);
        $newName = md5(uniqid());
        if (array_key_exists($photoExtension, $authorizedMimeTypes) && mime_content_type($_FILES['myAccountProfilImage']['tmp_name']) == $authorizedMimeTypes[$photoExtension]) {
            if (move_uploaded_file($_FILES['myAccountProfilImage']['tmp_name'], 'uploads/' . $newName.'.'. $photoExtension)) {
                chmod('uploads/' . $newName.'.'. $photoExtension, 0644);
                $users->profilePicture = 'uploads/' .$newName.'.'. $photoExtension;
                if ($users->updateUserImg()) {
                    $_SESSION['user']->profilePicture = $users->profilePicture;
                }
            } else {
                $formErrors['myAccountProfilImage'] = 'Veuillez reessayer plus tard.';
            }
        } else {
            $formErrors['myAccountProfilImage'] = 'Veuillez selectionner une image.';
        }
    } else {
        $users->profilePicture = $_SESSION['user']->profilePicture;
    }
}

if (isset($_POST['email'])) {

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL, FILTER_NULL_ON_FAILURE)) {
            if ($users->checkIfUserExist() > 0 && $_POST['email'] != $_SESSION['user']->email) {
                $formErrors['email'] = MAIL_ERROR_EXIST;
            }else{
                $users->email = $_POST['email'];
                $users->updateUserEmail();
                $_SESSION['user']->email = $users->email;
            }
        } else {
            $formErrors['email'] = MAIL_ERROR_INVALID;
        }
    } else {
        $users->email = $_SESSION['user']->email;
    }
}

if (isset($_POST['Username'])) {

    if (!empty($_POST['Username'])) {
        if (preg_match($regex['userName'], $_POST['Username'])) {
            if ($users->userNameExist() > 0 && $_POST['Username'] != $user->userName) {
                $formErrors['Username'] = USERNAME_ERROR_EXIST;
            }else{
                $users->userName = strip_tags($_POST['Username']);
                $users->updateUser();
                $_SESSION['user']->userName = $users->userName;
            }
        } else {
            $formErrors['Username'] = USERNAME_ERROR_INVALID;
        }
    } else {
        $users->userName = $_SESSION['user']->userName;
    }
}
if (isset($_POST['passwordBtn'])) {
    if (!empty($_POST['oldPassword'])) {
        $hash = $users->getPasswordById();
        if (password_verify($_POST['oldPassword'], $hash->password)) {
            if ($_POST['newPassword'] == $_POST['confirmPassword']) {
                $users->password = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
                $users->updateUserPassword();
            } else {
                $formErrors['newPassword'] = $formErrors['confirmPassword'] = PASSWORD_ERROR_DIFFERENT;
            }
        } else {
            $formErrors['oldPassword'] = PASSWORD_ERROR_EXIST;
        }
    } else {
        $formErrors['oldPassword'] = PASSWORD_ERROR_EMPTY;
    }
}

$offer->id_users = $_SESSION['user']->id;
$count = $offer->countOffersUsersPages();

// Pagination
$page = (!empty($_GET['page']) ? $_GET['page'] : 1);

$offer->limit = 5;

$pageNumber = ceil($count / $offer->limit);
$offer->offset = ($page - 1) * $offer->limit;

if( $_GET['page']>$pageNumber && $pageNumber>0){
    header('Location: Page404');
    exit;
}
$offerList = $offer->getUserOfferList();

if (isset($_POST['deleteOffer'])) {
    if (!empty($_POST['deleteOffer'])) {
        $offer->id = $_POST['deleteOffer'];
        $offerStatus = $offer->getOfferByIdForSupprStatus();
        $status->id = $offerStatus->id_status;
        var_dump($status->id);
        var_dump($offer->deleteOfferById());
        var_dump($status->deleteOfferById());
        $offerList = $offer->getUserOfferList();
    }
}
$opinion->id_users = $_SESSION['user']->id;
$opinions = $opinion->getOpinionByUser();

if (isset($_POST['deleteOpinion'])) {
    if (!empty($_POST['deleteOpinion'])) {
        $opinion->id = $_POST['deleteOpinion'];
        $opinion->deleteOpinionById();
        header('Location: Profil-'.$_GET['page']);
        exit;
    }
}