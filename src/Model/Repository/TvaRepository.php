<?php

namespace App\Model\Repository;

use App\Core\BdManager;

$path = $_SERVER['DOCUMENT_ROOT'];
include_once  $path . '/src/Core/BdManager.php';

class TvaRepository
{

    private $bdmanager;

    public function __construct(){
        $this->bdmanager = new BdManager();
    }
    
    public function findAll(){
        $result = $this->bdmanager->findAll('tva');
        return $result;
    }
    /**
     * méthode pour ajouter un enregistrement a la table marque
     * @param mixed $post le tableau representera le $_POST
     * @return void
     */
    public function add($post){
        $this->bdmanager->add($post, 'tva');
    }


    public function delete($id){
        $this->bdmanager->delete('tva', $id);
    }

   
    public function find(int $id)
    {
        $result = $this->bdmanager->find('tva', $id);
        return $result;
    }


    public function edit($post ,$id){
        $this->bdmanager->edit($post, 'tva', $id);

    }


}