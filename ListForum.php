<?php
include '../controller/ForumF.php';
$ForumF = new ForumF();
$list = $ForumF->ListForum();

?>
<html>

<head>
<a href="../../forum.php">Retourner à la page forum </a>
<br>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tapez l'id que vous chercher" title="Type in a name" >
<br>
</div> <button> <a onclick="window.print()">Print this page</a></button>

<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>



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
        <h1>Liste des commentaires/signalisation selon l'identifiant des forums/blogs</h1>
        
    </center>
    <table id="dataTable"  border="1" align="center" width="70%">
        <tr>
            <th>IdF</th>
            <th>Id Post</th>
            <th>commentaire</th>
            <th>signalisation</th>
        </tr>
        <?php
        foreach ($list as $forum) {
        ?>
            <tr>
                <td><?= $forum['idF']; ?></td>
                <td><?= $forum['idP']; ?></td>
                <td><?= $forum['commentaire']; ?></td>
                <td><?= $forum['signalisation']; ?></td>
                <td align="center">
                    <form method="POST" action="updateforum.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $forum['idF']; ?> name="idF">
                    </form>
                </td>
                <td>
                    <a href="deleteforum.php?idF=<?php echo $forum['idF']; ?>">Delete</a>
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