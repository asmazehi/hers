<?php
class Message
{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $type = null;
    private ?string $message = null;

    public function __construct($id = null, $n='', $p='', $a='', $d='')
    {
        $this->id= $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->type = $a;
        $this->message = $d;
    }

    /**
     * Get the value of idClient
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of lastName
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getMsg()
    {
        return $this->message;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setMsg($message)
    {
        $this->message = $message;

        return $this;
    }
}
