<?php
include '../controller/MessageM.php';
$messageM = new messageM();
$messageM->deletemessage($_GET["id"]);
header('Location:ListMessages.php');
