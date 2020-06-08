# Projet_web
Création d'un site web dans un projet d'étude deuxieme année 
<?PHP
class publicite{
	private $id_pub;
	private $titre;
	private $description;
	private $image;
	
	function __construct($titre,$description,$image){
		$this->titre=$titre;
		$this->description=$description;
		$this->image=$image;
	}
	
	function getid_pub(){
		return $this->id_pub;
	}
	function gettitre(){
		return $this->titre;
	}
	function getdescription(){
		return $this->description;
	}
	function getimage(){
		return $this->image;
	}
	
}

?>
