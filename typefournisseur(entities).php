# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
class type_fournisseur{
	private $id_type;
	private $type;
	
	function __construct($type){
		
		$this->type=$type;
		
	}
	
	function getid_type(){
		return $this->id_type;
	}
	function gettype(){
		return $this->type;
	}
	
}

?>
