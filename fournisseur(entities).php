# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
class fournisseur{
	private $id_fournisseur;
	private $nom;
	private $prenom;
	private $adresse;
	private $email;
        private $categorie;
        
	
	function __construct($nom,$prenom,$adresse,$email,$categorie){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->adresse=$adresse;
		$this->email=$email;
                $this->categorie=$categorie;
                
		
	}
	
	function getid_fournisseur(){
		return $this->id_fournisseur;
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
	function getemail(){
		return $this->email;
	}
	function getcategorie(){
		return $this->categorie;
	}
	
}

?>
