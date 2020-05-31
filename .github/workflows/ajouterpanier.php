<?php
require '_header.php';
if (isset($_GET['id'])) {

	$json = array('error' => true);
    $produit=$db->query('Select id from produits where id=:id',array('id' => $_GET['id']));
    if (empty($produit)) {

    	$json['message'] = "Le produit n'exite pas!";
    }
    $panier->add($produit[0]->id);
    $json['error'] = false;
    $json['total'] = $panier->totale();
    $json['count'] = $panier->count();
    $json['message'] = "Le produit a été bien ajouté à votre panier";
}
else
{
	$json['message'] = "Vous n'avez pas selectionner de produits a ajouter";
}
echo json_encode($json);
?>
