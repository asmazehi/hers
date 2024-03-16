<?php
include '../controller/ForumF.php';
$ForumF = new ForumF();
$ForumF->deleteforum($_GET["idF"]);
header('Location:ListForum.php');
