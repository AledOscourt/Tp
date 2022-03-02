<?php
$opinions = new opinions();

if (!empty($_POST['deleteOpinion'])) {
    $opinions->id = $_POST['deleteOpinion'];
    $opinions->deleteOpinionById();
}

$opinionsList = $opinions->getOpinionForAdmin();