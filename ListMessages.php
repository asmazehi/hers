<?php
include '../controller/MessageM.php';
$messageM = new MessageM();
$list = $messageM->ListMessages();
?>
<html>

<head>
<a href="../../forum.php">Retourner à la page forum </a>
<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tapez l'id que vous chercher" title="Type in a name" >
<br>
</div> <button> <a onclick="window.print()">Print this page</a></button>


<br>
</head>
<style>
body {
    background-image: url("../../images/backend.jpg");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
		}
        table {
  background-color: #F7F7EE;
}
        </style>
<body>

    <center>
        <h1>Liste des statuts</h1>
        
    </center>
    <table  id="dataTable" border="1" align="center" width="70%">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Type</th>
            <th>Message</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $message) {
        ?>
            <tr>
                <td><?= $message['id']; ?></td>
                <td><?= $message['Nom']; ?></td>
                <td><?= $message['Prenom']; ?></td>
                <td><?= $message['Type']; ?></td>
                <td><?= $message['Message']; ?></td>
                <td align="center">
                    <form method="POST" action="updatemessage.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $message['id']; ?> name="id">
                    </form>
                </td>
                <td>
                    <a href="deletemessage.php?id=<?php echo $message['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value;
        table = document.getElementById("dataTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue =td.innerText;
                if (txtValue.indexOf(filter)==0) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</body>

</html>





