<?php 
include 'C:\xampp\htdocs\projet web\controller\factureC.php';
include 'C:\xampp\htdocs\projet web\view\back\facture2.html';

$error = "";

// create facture
$facture = null;

// create an instance of the controller
$factureC = new FactureC();

if (isset($_POST["email"]) && isset($_POST["numero"])) 
    if (!empty($_POST["email"]) && !empty($_POST["numero"])) {
        $email = $_POST['email'];
        $numero = $_POST['numero'];

        // Check if the number is unique
        if ($factureC->exists($numero)) {
            $error = "Le numéro existe déjà";
        } else {
            $facture = new Facture($email, $numero);
            $factureC->addfacture($facture);
            header('Location: listfactures.php');
            exit();
        }
    } else {
        $error = "Missing information";
    }


?>



