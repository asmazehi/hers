<?php

include 'C:\xampp\htdocs\projet web\config.php';
include 'C:\xampp\htdocs\projet web\model\reservation.php';

class reservationC
{
    public function listreservations()
    {
        $sql = "SELECT * FROM reservation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function DELETE($nom)
    {
        $sql = "DELETE FROM reservation WHERE nom=:nom";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':nom', $nom);
        try { 
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addreservation($reservation)
    {
        $conn = config::getConnexion();
        $stmt = $conn->prepare("INSERT INTO reservation (nom, email, date, time) VALUES (:nom, :email, :date, :time)");
        $nom = $reservation->getnom();
        $email = $reservation->getemail();
        $date = $reservation->getdate();
        $time = $reservation->gettime();
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':time', $time);
        if ($stmt->execute()) {
            echo "New reservation added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->closeCursor();
    }

    function updateReservation($reservation, $nom)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reservation SET 
                    email = :email, 
                    date = :date, 
                    time = :time, 
                   
                WHERE nom= :nom'
            );
            $query->execute([
                'nom' => $n,
                'email' => $reservation->getemail(),
                'date' => $reservation->getdate(),
                'time' => $reservation->gettime(),
               
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    
    public function showReservation($nom)
    {
        $db = Config::getConnexion();
        $stmt = $db->prepare("SELECT * FROM reservation WHERE nom = nom");
        $stmt->execute([$nom]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
// la fonction list permet de lister les donnee du table reservation avec le tri par date
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


