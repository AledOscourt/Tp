<?php
$pops = new pops();
$pops->id=$_GET['id'];
$pops=$pops->getPopWithImg();
