<?php

use App\Model\Repository\MarqueRepository;
use App\Model\Repository\ProduitRepository;
use App\Model\Repository\TvaRepository;

$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';
include_once  $path . '/src/Model/Repository/ProduitRepository.php';
include_once  $path . '/src/Model/Repository/TvaRepository.php';
include_once  $path . '/src/Model/Repository/MarqueRepository.php';

$produitRepo = new ProduitRepository();
$marqRepo = new MarqueRepository();
$tvaRepo = new TvaRepository();
// je recup le param passé dans l'URL
if ($_GET['param']) {
    $param = $_GET['param'];
}
// je test le param passé dans l'URL
switch ($param) {
    case 'liste':
        $produits = $produitRepo->findAll();
        include_once ROOT . 'views/produit/produit.php';
        break;
    case 'addProduit':
        
        $marques = $marqRepo->findAll();
        if(isset($_POST['marque_id'])){
            $curenMarque = $marqRepo->find($_POST['marque_id']);
        }
      
        $tvas = $tvaRepo->findAll();

        if ($_POST) {
            $produitRepo->add($_POST);
            header("location: ProduitController.php?param=liste");
        }
        include_once ROOT . 'views/produit/addProduit.php';
        break;
}
