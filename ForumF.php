<?php
include '../config.php';
include '../model/Forumm.php';

class ForumF
{
    public function listForum()
    {
        $sql = "SELECT * FROM forum";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteforum($idF)
    {
        $sql = "DELETE FROM forum WHERE idF = :idF";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idF', $idF);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getForum());
        }
    }

    function addforum($forum)
    {
        $sql = "INSERT INTO forum  
        VALUES (NULL, :m,:n,:p)";
        $db = config::getConnexion();
        try {
            //print_r($client->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'm' => $forum->getidP(),
                'n' => $forum->getcommentaire(),
                'p' => $forum->getsignalisation(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateforum($forum, $idF)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE forum SET 
                    idP =:idP,
                    commentaire = :commentaire, 
                    signalisation = :signalisation
                WHERE idF= :idF'
            );
            $query->execute([
                'idF' => $idF,
                'idP' => $forum->getidP(),
                'commentaire' => $forum->getcommentaire(),
                'signalisation' => $forum->getsignalisation(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getForum();
        }
    }

    function showforum($idF)
    {
        $sql = "SELECT * from forum where idF = $idF";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $forum = $query->fetch();
            return $forum;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>