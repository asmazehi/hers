<?php
include 'C:\xampp\htdocs\projet web\controller\facturec.php';

$FactureC = new factureC();
$FactureC->delete($_GET["numero"]);
header('Location:listfactures.php');
?>