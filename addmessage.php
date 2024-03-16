<?php

include '../controller/MessageM.php';

$error = "";

// create client
$message = null;

// create an instance of the controller
$messageM = new messageM();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["type"]) &&
    isset($_POST["message"])
) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["type"]) &&
        !empty($_POST["message"])
    ) {
        $message = new message(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['type'],
            $_POST['message'],
        );
        $messageM->addmessage($message);
        header('Location:../../forum.php');
    } else
        $error = "Missing information";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Statut</title>
    <style>
        /* Style the form container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* Style the form itself */
        form {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            max-width: 1500px;
            max-height: 500px;
            width: 100%;
            background-color: ##fffbfb;
            font-family: Brush Script MT ,cursive;
        }

        /* Style the form inputs and labels */
        label, input, textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 20px;
        }

        input[type=submit], input[type=reset] {
            background-color: #FFABAB;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type=submit]:hover, input[type=reset]:hover {
            background-color: #FFABAB;
        }

        /* Style the error message */
        #error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .table-container {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  max-width: 1500px;
}
body {
    background-image: url("../../images/women.jpg");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
		}
table {
  border-collapse: collapse;
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
}

td, th {
  padding: 8px;
  text-align: left;
}
    </style>
</head>

<body>
    
    <a href="../../forum.php">Retourner à la page forum </a>
    <hr>
    <br>
<br>
<br>
<br>
<br>
<br>
    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1.5">

            <tr>
                <td>
                    <label  for="nom">Nom:
                    </label>
                </td>
                <td><input  type="text"  name="nom" id="nom"  maxlength="20" pattern="[A-Za-z]+" required title="Le champ ne doit contenir que des lettres (majuscules ou minuscules)"> </td>
                
            </tr>
            <tr>
                <td>
                    <label for="prenom">prenom:
                    </label>
                </td>
                <td><input type="text" name="prenom" id="prenom" maxlength="20" pattern="[A-Za-z]+" required title="Le champ ne doit contenir que des lettres (majuscules ou minuscules)"></td>
            </tr>
            <tr>
                <td>
                    <label for="type">But du statut:
                    </label>
                </td>
                <td>
                    <select type="text" name="type" id="type" required>
                    <option value="Partager une éxperience">Partager une éxperience</option>
                    <option value="Ecrire un blog éducatif">Ecrire un blog éducatif</option>
                </select>
                </td>
            
                  
            </tr>
            <tr>
                <td>
                    <label for="message">Statut:
                    </label>
                </td>
                <td>
                    <textarea id="message" name="message" rows="5" cols="40" required></textarea>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input type="reset" value="réinitialiser">
                </td>
                <td>
                <input type="submit" value="sauvegarder">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>