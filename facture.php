<?php
class facture {
    
    public? string $email;
    public?  int $numero ;
   
    


    // Constructor
   public function __construct( $e, $n) {
   
        $this->email = $e;
        $this->numero = $n;
    }

    // Getter methods
   
    

  

    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }
    

    public function getnumero()
    {
        return $this->numero;
    }

    public function setnumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
   
}



?>
