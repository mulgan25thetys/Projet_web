<?php

  class expediteur
   {
     private $id;
     private $mission;
     public function __construct($id,$mission)
     {
       $this->id=$id;
       $this->mission=$mission;
     }
     public function getid(){return $this->id;}
     public function getmission(){return $this->mission;}
   }
?>