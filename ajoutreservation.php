<?php

include 'C:\xampp\htdocs\projet web\controller\reservationC.php';
include'C:\xampp\htdocs\projet web\view\back\reservation.html';




$error = "";

// create reservation
$reservation = null;

// create an instance of the controller
$reservationC = new ReservationC();


if (
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["date"]) &&
    isset($_POST["time"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["email"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["time"])
    ) {
        $reservation = new Reservation($_POST['nom'], $_POST['email'], $_POST['date'], $_POST['time']);
        $reservationC->addreservation($reservation);
       
        header('Location: listreservations.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
