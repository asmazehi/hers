<?php

include '../controller/MessageM.php';

$error = "";

// create client
$message = null;

// create an instance of the controller
$messageM = new messageM();
if (
    isset($_POST["id"]) &&
    isset($_POST["Nom"]) &&
    isset($_POST["Prenom"]) &&
    isset($_POST["Type"]) &&
    isset($_POST["Message"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST['Nom']) &&
        !empty($_POST["Prenom"]) &&
        !empty($_POST["Type"]) &&
        !empty($_POST["Message"])
    ) {
        $message = new message(
            $_POST['id'],
            $_POST['Nom'],
            $_POST['Prenom'],
            $_POST['Type'],
            $_POST['Message'],
        );
        $messageM->updatemessage($message, $_POST["id"]);
        header('Location:ListMessages.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
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
            background-color: #fffbfb;
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
<body>
    <button><a href="ListMessages.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $message = $messageM->showmessage($_POST['id']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id">Id :
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" value="<?php echo $message['id']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="Nom" id="Nom" value="<?php echo $message['Nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="Prenom" id="Prenom" value="<?php echo $message['Prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Type">Type du statut:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Type" value="<?php echo $message['Type']; ?>" id="Type">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Message">Statut:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="Message" id="Message" value="<?php echo $message['Message']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>