<?php
   class autres
   {
     private $email;
     private $ident;
     private $pseudo;

     public function __construct($email,$ident,$pseudo)
     {
      $this->email=$email;
      $this->ident=$ident;
      $this->pseudo=$pseudo;
     }
      
     public function getemail(){return $this->email;}
     public function getident(){return $this->ident;}
     public function getpseudo(){return $this->pseudo;}
   }
?>