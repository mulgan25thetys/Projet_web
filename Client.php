<?PHP
class Client{
	private $nom;
	private $prenom;
	private $email;
	private $credit;
	private $pwd;
	private $cadeau;
	function __construct($nom,$prenom,$email,$credit,$pwd,$cadeau){
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->email=$email;
		$this->credit=$credit;
		$this->pwd=$pwd;
		$this->cadeau=$cadeau;
	}
	
	function getNom(){
		return $this->nom;
	}
	function getPrenom(){
		return $this->prenom;
	}
	function getEmail(){
		return $this->email;
	}
	

	function getCredit(){
		return $this->credit;
	}
	function getPwd(){
		return $this->pwd;
	}
	function getCadeau(){
		return $this->cadeau;
	}


	function setNom($nom){
		$this->nom=$nom;
	}
	function setPrenom($prenom){
		$this->prenom=$prenom;
	}
	function setEmail($email){
		$this->email=$email;
	}
	
	function setCredit($credit){
		$this->credit=$credit;
	}
	function setPwd($pwd){
		$this->pwd=$pwd;
	}
	function setCadeau($cadeau){
		$this->cadeau=$cadeau;
	}
	
}
?>
