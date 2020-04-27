<?php
   class lignecommande
   {
   	 private $nom_prod;
   	 private $type;
   	 private $qte;
   	 private $client;
   	 private $mail;
   	 private $adresse;
   	 private $tel;
   	 private $livraison;
   	 private $prix;
   	 private $datecmd;

   	 public function __construct($type,$nom_prod,$qte,$client,$mail,$adresse,$tel,$livraison,$prix,$datecmd)
   	 {
   	 	$this->nom_prod=$nom_prod;
   	 	$this->type=$type;
   	 	$this->qte=$qte;
   	 	$this->client=$client;
   	 	$this->mail=$mail;
   	 	$this->adresse=$adresse;
   	 	$this->tel=$tel;
   	 	$this->livraison=$livraison;
   	 	$this->prix=$prix;
   	 	$this->datecmd=$datecmd;
   	 }

   	 public function getnomprod(){return $this->nom_prod;}
   	 public function gettype(){return $this->type;}
   	 public function getqte(){return $this->qte;}
   	 public function getclient(){return $this->client;}
   	 public function getmail(){return $this->mail;}
   	 public function getadr(){return $this->adresse;}
   	 public function gettel(){return $this->tel;}
   	 public function getlivraison(){return $this->livraison;}
   	 public function getprix(){return $this->prix;}
   	 public function getdate(){return $this->datecmd;}
   }
    class lignecommandemod
   {
       private $nom_prod;
       private $type;
       private $qte;
       private $client;
       private $mail;
       private $adresse;
       private $tel;
       private $livraison;
       private $prix;
       private $datecmd;

       public function __construct($type,$nom_prod,$qte,$mail,$adresse,$tel,$livraison,$prix,$datecmd)
       {
         $this->nom_prod=$nom_prod;
         $this->type=$type;
         $this->qte=$qte;
         $this->mail=$mail;
         $this->adresse=$adresse;
         $this->tel=$tel;
         $this->livraison=$livraison;
         $this->prix=$prix;
         $this->datecmd=$datecmd;
       }
       
       public function getnomprod(){return $this->nom_prod;}
       public function gettype(){return $this->type;}
       public function getqte(){return $this->qte;}
       public function getclient(){return $this->client;}
       public function getmail(){return $this->mail;}
       public function getadr(){return $this->adresse;}
       public function gettel(){return $this->tel;}
       public function getlivraison(){return $this->livraison;}
       public function getprix(){return $this->prix;}
       public function getdate(){return $this->datecmd;}
   }
   
?>
