<?php
class Forum
{
    private ?int $idF = null;
    private ?int $idP = null;
    private ?string $commentaire = null;
    private ?string $signalisation = null;

    public function __construct($idF = null,$m=null, $n='', $p='')
    {
        $this->idF = $idF;
        $this->idP = $m;
        $this->commentaire = $n;
        $this->signalisation = $p;
    }

    /**
     * Get the value of idClient
     */
    public function getIdF()
    {
        return $this->idF;
    }

    public function getidP()
    {
        return $this->idP;
    }

    public function setidP($idP)
    {
        $this->idP = $idP;
        return $this;
    }

    public function getcommentaire()
    {
        return $this->commentaire;
    }

    public function setcommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getsignalisation()
    {
        return $this->signalisation;
    }

    public function setsignalisation($signalisation)
    {
        $this->signalisation = $signalisation;
        return $this;
    }
}
?>
