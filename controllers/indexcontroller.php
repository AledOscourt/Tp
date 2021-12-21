<?php
$formErrors = [];

$regex = [
    'user_name' => '#^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$#',
];
/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */
if (count($_POST) > 0) {
    if (!empty($_POST['user_firstName'])) {
        if (preg_match($regex['user_firstName'], $_POST['user_firstName'])) {
            $firstName = strip_tags($_POST['user_firstName']);
        } else {
            $formErrors['user_firstName'] = 'Veuillez vérifier votre prénom. Votre prénom  doit commencer par une majuscule et ne peut contenir que des lettres, des espaces, des tirets';
            
        }
    } else {
        $formErrors['user_firstName'] = 'Le prénom est vide';
        
    }
    if (!empty($_POST['user_name'])) {
        if (preg_match($regex['user_name'], $_POST['user_name'])) {
            $name = strip_tags($_POST['user_name']);
            
        } else {
            $formErrors['user_name'] = 'Veuillez vérifier votre nom. Votre nom  doit commencer par une majuscule et ne peut contenir que des lettres, des espaces, des tirets';
            
        }
    } else {
        $formErrors['user_name'] = 'Le nom est vide';
        
    }

    if (!empty($_POST['user_gender'])) {
        if ($_POST['user_gender'] === 'M.' || $_POST['user_gender'] === 'Mme') {
            
        } else {
            $formErrors['user_gender'] = 'Choisissez un genre';
            
        }
    } else {
        $formErrors['user_gender'] = 'Le genre est vide';
        
    }
    
}
?>