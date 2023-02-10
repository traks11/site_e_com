<?php

use App\Model\Repository\TvaRepository;



$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/init.php';
include_once  $path . '/src/Model/Repository/TvaRepository.php';

$tvaRepo = new TvaRepository();
// je recup le param passé dans l'URL
if ($_GET['param']) {
    $param = $_GET['param'];
}

switch ($param) {
        // param = liste donc j'affiche la liste des tva
    case 'liste':
        $tvas = $tvaRepo->findAll();
        include_once ROOT . 'views/tva/tva.php';

        break;
    case 'addTva':
        $error = "";

        if ($_POST) {
            extract($_POST);
            $taux = (float) $_POST['taux'];
            // var_dump($taux);
            // die;
            if (!$_POST['name']) {
                $error .= "entrez un nom pour votre tva";
            }
            if (!$taux or !is_float($taux)) {
                $error .= "entrez un taux  decimal";
            }
            if (!$error) {
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->add($_POST);
                header("location: TvaController.php?param=liste");
            }
        }
        include_once ROOT . 'views/tva/addTva.php';
        break;
        

    case 'deleteTva':
        $id = $_GET['id'];
        $tvaRepo->delete($id);
        header("location: TvaController.php?param=liste");
        break;

    case 'showTva':

        $id = $_GET['id'];
        $tva = $tvaRepo->find($id);
        include_once ROOT . 'views/tva/showTva.php';

        break;

    case 'editTva':
        $error = "";
        $id = $_GET['id'];
        // je récupére l'enregistrement a modifier pour pré-remplir le formulaire
        $tva = $tvaRepo->find($id);
        // je recupére l'enregistrement a modifier pour compléter les inputs du formulaire
        // le récuperation ce fait avant la modif      
        if ($_POST) {
            $taux = (float) $_POST['taux'];
         
            if (!$_POST['name']) {
                $error .= "entrez un nom pour votre tva";
            }
            // je test que le taux existe et qu'il est bien de type float 
            if (!$taux or !is_float($taux)) {
                $error .= "entrez un taux  decimal";
            }
            //je test la variable error si elle est vide j'enregistre les modif 
            if(!$error){
                $_POST['taux'] = $_POST['taux'] / 100;
                $tvaRepo->edit($_POST, $id);
                header("location: TvaController.php?param=liste");

            }
          
        }
        include_once ROOT . 'views/tva/editTva.php';
        break;
}
