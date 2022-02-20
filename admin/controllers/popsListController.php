<?php
$pops = new pops();

if (!empty($_POST['deletePop'])) {
    $pops->id = $_POST['deletePop'];
    $pops->deletePops();
}
$popsList = $pops->getPopsList();