<?php 

   class panier
   {
   	  private $db;
   	  public function __construct($db)
   	  {
         if (!isset($_SESSION)) {
         	session_start();
         }
         if (!isset($_SESSION['panier'])) {
         	$_SESSION['panier'] = array();
         }
         $this->db = $db;
         if (isset($_GET['delpanier']) && isset($_GET['nom_prodpan'])) {
            $idd=$_GET['nom_prodpan'];
            $this->del($_GET['delpanier']);
            $this->db->effacer("DELETE from `panier` where `refp_prod` = '$idd'");
         }
         if (isset($_GET['viderpanier'])) {
            $this->vider();
            $this->db->effacer("TRUNCATE `panier`");
            $_SESSION['panier'] = array();
         }
         if (isset($_POST['panier']['num-product2'])) {
            # code...
            $this->recal();
         }
   	  }
        public function recal()
        {
          foreach ($_SESSION['panier'] as $produit_id => $qte) {
             # code...
            if (isset($_POST['panier']['num-product2'][$produit_id])) {
               # code...
               $_SESSION['panier'][$produit_id] = $_POST['panier']['num-product2'][$produit_id] ;
            }
            
          }
        }
        public function count()
         {
            return array_sum($_SESSION['panier']);
         }
   	  public function totale()
   	  {
         $total = 0;
                $ids = array_keys($_SESSION['panier']);
                if (empty($ids)) {
                  # code...
                  $produits= array();
                }
                else
                {
                  $produits = $this->db->query("Select *from produits where id in ('".implode("','",$ids)."') ");
                }
   	   foreach ($produits as $value) {
   	  	 	$total += $value->pu * $_SESSION['panier'][$value->id];
   	  	}

   	  	 return $total;
   	  }
   	  public function add($produit_id)
   	  { 
   	  	if (isset($_SESSION['panier'][$produit_id])){
   	  		# code...
   	  		$_SESSION['panier'][$produit_id]++;
   	  	}
   	  	else
   	  	{

   	  	 $_SESSION['panier'][$produit_id] = 1;
   	  	}
   	  }
   	  public function del($id)
   	  {
   	  	unset($_SESSION['panier'][$id]);
   	  }
        public function vider()
        {
         $_SESSION['panier'] = array();
        }
   }
?>