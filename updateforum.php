<?php

include '../controller/ForumF.php';

$error = "";

// create client
$forum = null;

// create an instance of the controller
$forumF = new forumF();
if (
    isset($_POST["idF"]) &&
    isset($_POST["idP"]) &&
    isset($_POST["commentaire"]) &&
    isset($_POST["signalisation"])
) {
    if (
        !empty($_POST["idF"]) &&
        !empty($_POST['idP']) &&
        !empty($_POST["commentaire"]) &&
        !empty($_POST["signalisation"])
    ) {
        $forum = new forum(
            $_POST['idF'],
            $_POST['idP'],
            $_POST['commentaire'],
            $_POST['signalisation'],
        );
        $forumF->updateforum($forum, $_POST["idF"]);
        header('Location:ListForum.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update forum</title>
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
    <button><a href="ListForum.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idF'])) {
        $forum= $forumF->showforum($_POST['idF']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idF">IdF :
                        </label>
                    </td>
                    <td><input type="text" name="idF" id="idF" value="<?php echo $forum['idF']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idP">Id post :
                        </label>
                    </td>
                    <td><input type="number" name="idP" id="idP" value="<?php echo $forum['idF']; ?>" min="1" max="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="commentaire">Commentaire:
                        </label>
                    </td>
                    <td><input type="text" name="commentaire" id="commentaire" value="<?php echo $forum['commentaire']; ?>" ></td>
                </tr>
                <tr>
                    <td>
                        <label for="signalisation">Signalisation:
                        </label>
                    </td>
                    <td><select id="signalisation" name="signalisation">
                <option value="Trés bon post, pas besoin de le signaler">Trés bon post, pas besoin de le signaler</option>
                          <option value="Contenu inapproprié">Contenu inapproprié</option>
                          <option value="Spam">Spam</option>
                          <option value="Droits d'auteur">Droits d'auteur</option>
                          <option value="Harcèlement">Harcèlement</option>
                          <option value="Sécurité">Sécurité</option>
                        </select></td><?php echo $forum['signalisation']; ?>"></td>
                </tr>
                
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