<?php
$categories = new category();
$categories->id = $_GET['id'];
$category = $categories->getCategoryforUpdate();
if (count($_POST) > 0) {
    if (!empty($_POST['categoryInput'])) {
        $categories->name = strip_tags($_POST['categoryInput']);
    }else {
        $formErrors['categoryInput'] = Category_ERROR_EMPTY;
    }


    if (count($formErrors) == 0) {
        $categories->updateCategory();
        header('Location: admin_liste_categorie');
        exit;
    }     
}