<?php
class autres
   {
     private $autre0;
     private $autre1;
     private $autre2;

     public function __construct($autre0,$autre1,$autre2)
     {
      $this->autre0=$autre0;
      $this->autre1=$autre1;
      $this->autre2=$autre2;
     }
      
     public function getautre0(){return $this->autre0;}
     public function getautre1(){return $this->autre1;}
     public function getautre2(){return $this->autre2;}
   }
   class lignecommande
   {
     private $ref;
   	 private $total;
   	 private $qte;
     private $pays;
     private $ville;
     private $adr;
     private $tel;
     private $mail;

   	 public function __construct($ref,$qte,$total,$pays,$ville,$adr,$tel,$mail)
   	 {
      $this->ref=$ref;
   	 	$this->total=$total;
   	 	$this->qte=$qte;
      $this->pays=$pays;
      $this->ville=$ville;
      $this->adr=$adr;
      $this->tel=$tel;
      $this->mail=$mail;
   	 }
      
     public function getref(){return $this->ref;}
   	 public function gettotal(){return $this->total;}
   	 public function getqte(){return $this->qte;}
     public function getpays(){return $this->pays;}
     public function getville(){return $this->ville;}
     public function getadr(){return $this->adr;}
     public function gettel(){return $this->tel;}
     public function getmail(){return $this->mail;}
     
   }
?>