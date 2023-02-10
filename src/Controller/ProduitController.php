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
        //________________________________________________________________
    case 'addProduit':
        $marques = $marqRepo->findAll();
        if (isset($_POST['marque_id'])) {
            $curenMarque = $marqRepo->find($_POST['marque_id']);
        }
        $tvas = $tvaRepo->findAll();
        if ($_POST) {

            $file = $_FILES['image']['name'];
            // si y'a eut un téléchargement de fichier
            if ($file) {
                $image = new SplFileInfo($file);
                $new_name_image = uniqid() . '.' . $image->getExtension();
                move_uploaded_file(
                    $_FILES['image']['tmp_name'],
                    ROOT . "public/images/" . $new_name_image
                );
            } else {
                $new_name_image = "defaultImage.png";
            }
            $_POST['image'] = $new_name_image;
            $produitRepo->add($_POST);
            header("location: ProduitController.php?param=liste");
        }
        include_once ROOT . 'views/produit/addProduit.php';
        break;
}
