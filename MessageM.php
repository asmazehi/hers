<?php
include '../config.php';
include '../model/Message.php';

class MessageM
{
    public function listMessages()
    {
        $sql = "SELECT * FROM message";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletemessage($id)
    {
        $sql = "DELETE FROM message WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addmessage($message)
    {
        $sql = "INSERT INTO message  
        VALUES (NULL, :n,:p, :t,:m)";
        $db = config::getConnexion();
        try {
            //print_r($client->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'n' => $message->getNom(),
                'p' => $message->getPrenom(),
                't' => $message->getType(),
                'm' => $message->getMsg(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updatemessage($message, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE message SET 
                    Nom = :Nom, 
                    Prenom = :Prenom, 
                    Type = :Type, 
                    Message = :Message
                WHERE id= :id'
            );
            $query->execute([
                'id' => $id,
                'Nom' => $message->getNom(),
                'Prenom' => $message->getPrenom(),
                'Type' => $message->getType(),
                'Message' => $message->getMsg(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showmessage($id)
    {
        $sql = "SELECT * from message where id = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $message = $query->fetch();
            return $message;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
