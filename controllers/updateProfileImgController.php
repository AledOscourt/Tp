<?php
$formErrors = [];
$users = new users();
$users->id = $_SESSION['user']->id;


if (count($_POST) > 0) {


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
    } else {
        $users->profilePicture = $_SESSION['user']->profilePicture;
    }

    if (count($formErrors) == 0) {
        $users->updateUserImg();
        $_SESSION['user']->profilePicture = $users->profilePicture;
        header('Location: Profil');
        exit;
    }
}
