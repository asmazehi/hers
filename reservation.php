<?php
class Reservation {
    public ?string $nom;
    public? string $email;
    public?  string $date;
    public? string $time;
    


    // Constructor
   public function __construct($n, $e, $d, $t) {
    $this->nom = $n;
        $this->email = $e;
        $this->date = $d;
        $this->time = $t;
    }

    // Getter methods
    public function getnom()
    {
        return $this->nom;
    }
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
    

  

    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    

    public function getdate()
    {
        return $this->date;
    }

    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }
    public function gettime()
    {
        return $this->time;
    }

    public function settime($time)
    {
        $this->time = $time;

        return $this;
    }
    
}



?>


