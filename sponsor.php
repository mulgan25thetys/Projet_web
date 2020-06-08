# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
class sponsor{
	private $id_sponsor;
	private $nom;
	private $prenom;
	private $adresse;
	
	function __construct($nom,$prenom,$adresse){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
	}
	
	function getid_sponsor(){
		return $this->id_sponsor;
	}
	function getnom(){
		return $this->nom;
	}
	function getprenom(){
		return $this->prenom;
	}
	function getadresse(){
		return $this->adresse;
	}
	
}

?>
