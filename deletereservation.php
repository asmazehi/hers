

<?php
include 'C:\xampp\htdocs\projet web\controller\reservationC.php';

$ReservationC = new reservationC();
$ReservationC->delete($_GET["nom"]);
header('Location:listreservations.php');
?>