<?php
$category = new category();
$formErrors = [];

/**
 * la fonction count sert à compter le nombre d'élément dans un tableaux
 * ici elle à savoir si le formulaire à été envoyer
 */
if (count($_POST) > 0) {
    if (!empty($_POST['categoryInput'])) {
        $category->name = strip_tags($_POST['categoryInput']);
    } else {
        $formErrors['category'] = Category_ERROR_EMPTY;
    }
    if (count($formErrors) == 0) {
        $category->addCategory();
        header('Location: admin_ajout_categorie');
    exit;
    }
        
}
