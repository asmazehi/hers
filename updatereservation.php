<?php

include 'C:\xampp\htdocs\projet web\controller\reservationc.php';

$error = "";

// create reservation
$reservation = null;

// create an instance of the controller
$reservationC = new ReservationC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["time"]) &&
    isset($_POST["time"]) &&
    isset($_POST["time"]) 
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST['time']) &&
        !empty($_POST["time"]) &&
        !empty($_POST["time"]) 
    ) {
        $reservation = new Reservation(
            $_POST['nom'],
            $_POST['time'],
            $_POST['time'],
            $_POST['time']);
        
        $reservationC->updateReservation($reservation, $_POST["nom"]);
        header('Location:Listreservations.php');
    } else
        $error = "Missing information";
        if (isset($_POST['nom'])) {
            $reservation = $reservationC->showReservation($_POST['nom']);
            if ($reservation !== null) {
                // your form code here
            } else {
                echo "Reservation not found.";
            }
        }
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listreservations.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="nom">nom:</label>
                </td>
                <td><input type="nom" name="nom" id="nom" value="<?php echo $reservation['nom']; ?>" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="email">email:</label>
                </td>
                <td><input type="email" name="email" id="email" value="<?php echo $reservation['email']; ?>" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="date">date:</label>
                </td>
                <td><input type="date" name="date" id="date" value="<?php echo $reservation['date']; ?>" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="time">time:</label>
                </td>
                <td><input type="time" name="time" id="time" value="<?php echo $reservation['time']; ?>" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>








