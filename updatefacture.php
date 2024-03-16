<?php
// inclure le fichier de la classe de facture
include 'C:\xampp\htdocs\projet web\controller\facturec.php';

$error = "";

// create facture

$facture = "";

// create an instance of the controller
$factureC = new FactureC();

if (isset($_POST["email"]) && isset($_POST["numero"])) {
    if (!empty($_POST["email"]) && !empty($_POST["numero"])) {
        $facture = new Facture($_POST['email'], $_POST['numero']);
        $factureC->updatefacture($facture, $_POST["numero"]);
        header('Location: Listfactures.php');
    } else {
        $error = "Missing information";
    }
}

if (isset($_GET['numero'])) {
    $facture = $factureC->showfacture($_GET['numero']);
} else {
    // Valeur par défaut pour le formulaire
    $facture = array('email' => '', 'numero' => '');
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="listfactures.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="email">email:</label>
                </td>
                <td><input type="email" name="email" id="email" value="<?php echo $facture['email']; ?>" maxlength="30"></td>
            </tr>
            <tr>
                <td>
                    <label for="numero">numero:</label>
                </td>
                <td><input type="number" name="numero" id="numero" value="<?php echo $facture['numero']; ?>" maxlength="20"></td>
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








