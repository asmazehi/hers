<?php

include 'C:\xampp\htdocs\projet web\config.php';
include 'C:\xampp\htdocs\projet web\model\facture.php';

class factureC
{
    public function listfactures()
    {
        $sql = "SELECT * FROM facture";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function DELETE($numero)
    {
        $sql = "DELETE FROM facture WHERE numero=:numero";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':numero', $numero);
        try { 
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addfacture($facture)
    {
        $conn = config::getConnexion();
        $stmt = $conn->prepare("INSERT INTO facture (email, numero) VALUES (:email, :numero)");
        $email = $facture->getemail();
        $numero = $facture->getnumero();
        
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':numero', $numero);
        
        if ($stmt->execute()) {
            echo "facture ajoutée";
        } else {
            echo "Error: " . $stmt->error;
        }
        
        $stmt->closeCursor();
    }
    

    function updateFacture($facture, $numero)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE facture SET 
                    email = :email 
                    
                WHERE numero= :numero'
            );
            $query->execute([
                'numero' => $numero,
                'email' => $facture->getEmail()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    
    
    public function showFacture($numero)
    {
      
        $sql = "SELECT * from facture where numero = $numero";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $facture = $query->fetch();
            return $facture;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
    }
}
    public function exists($numero) {
        $sql = "SELECT * FROM facture WHERE numero='$numero'";
        $db = config::getConnexion();
        try {
            $result = $db->query($sql);
            $facture = $result->fetch(PDO::FETCH_ASSOC);
            if ($facture) {
                return true;
            }
            return false;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    
}
 // la fonction list permet de lister les donnee du table livraison avec le tri par date
 function tridate(){
    $sql="SELECT * FROM reservation ORDER BY date ASC";
$db = config::getConnexion();
      try{
$liste=$db->query($sql);
return $liste;
}
catch (Exception $e){
    die('Erreur: '.$e->getMessage());
}  
}    


