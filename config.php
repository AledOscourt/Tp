<?php
//Regexs
$regex = [
    'userName' => '#^([A-Za-zâäàéèùêëîïôöçñ0-9_-]{1,25}){1}$#',
    'password' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$#',
    'tags' => '#^([0-9]{1,4}){1}$#',
    'reference' => '#^([0-9]{5}){1}$#',
    'price' => '#^([0-9]{1,}[,.]{0,1}[0-9]{0,2})$#',
    'popName' => '#^([A-Za-zÀ-ÖØ-öø-ÿ -]+)$#',
    'phone' => '#^([0-9]+)$#',
    'contentTitle' => '#^([A-Za-zÀ-ÖØ-öø-ÿ ,.;]+)$#',
    'content' => '#^([A-Za-zÀ-ÖØ-öø-ÿ0-9à ,;.!-?]+)$#',
];

//Constants
define('LOGIN_ERROR_INVALID', 'L\'adresse mail ou le mot de passe est invalide.');

define('MAIL_ERROR_EXIST', 'Cette adresse mail existe déjà.');
define('MAIL_ERROR_EMPTY', 'Veuillez renseigner votre adresse mail.');
define('MAIL_ERROR_INVALID', 'Veuillez entrer une adresse mail valide.');

define('PASSWORD_ERROR_EMPTY', 'Veuillez entrer un mot de passe.');
define('PASSWORD_ERROR_INVALID', 'Veuillez entrer un mot de passe contenant au moins 8 caractères, une majuscule, une minucule, un chiffre et un caractère spécial.');
define('PASSWORD_ERROR_DIFFERENT', 'Les mots de passe ne correspondent pas.');
define('PASSWORD_ERROR_EXIST', 'Ce mots de passe est invalide.');

define('USERNAME_ERROR_EXIST', 'Cette pseudo existe déjà.');
define('USERNAME_ERROR_EMPTY', 'Veuillez renseigner votre nom d\'utilisateur.');
define('USERNAME_ERROR_INVALID', 'Veuillez entrer un nom d\'utilisateur valide.');

define('Brand_ERROR_EMPTY', 'Veuillez saisir une franchise.');
define('Brand_ERROR_INVALID', 'Veuillez saisir une franchise existante.');

define('Category_ERROR_EMPTY', 'Veuillez saisir une franchise.');