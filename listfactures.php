<?php
include 'C:\xampp\htdocs\projet web\controller\factureC.php';




$factureC = new FactureC();
$list = $factureC->listfactures();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>crud operations</title>
    <link href="./../css/styles.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body>

<div style="width:1450px;" id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Table facture </h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    <button class="btn btn-primary m-1 float-right"><a href="./ajoutfacture.php" class="text-light"><i class="fas fa-user-plus fa-lg"></i>&nbsp;&nbsp;ajout facture</a></button><br>
                    <!-- Suppression du texte non nécessaire -->
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    
                                    <th>email</th>
                                    <th>numero</th>
                                    
                                    <!-- La colonne de l'image est supprimée car elle n'est pas mentionnée dans les données $list -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($list as $row) { ?>
                                    <tr>
                                        
                                        <td><?php echo $row['email'] ?></td>
                                        <td><?php echo $row['numero'] ?></td>
                                        
                                        <td>
                                            <?php echo '<button class="btn btn-primary"><a href="./updatefacture.php?numero=1' . $row['numero'] . '" class="text-light"> <i class="fa fas fa-edit" style="font-size:36px"></i></a></button>
                                            <button class="btn btn-danger"><a href="./deletefacture.php?numero=' . $row['numero'] . '" class="text-light"> <i class="fa fa-trash"></i></a></button>'; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
        
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net
