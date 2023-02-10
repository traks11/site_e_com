<?php

namespace App\Core;

use PDO;
class BdManager
{

    private $dsn = "mysql:host=localhost;dbname=bd_site_tel";

    private $userName = "root";

    private $password = "";
  

    public function getConnect(){
        $pdo = new PDO($this->dsn, $this->userName, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }


    public function netoiFormulaire($string){

        $string = htmlspecialchars(strip_tags($string));
        
        return $string;


    }

   private function requet($sql , array $param = null ){

          // je recupe une connection a la bdd
        $con = $this->getConnect();
        if($param !== null){
            // si le tableau n'est pas vide j'execute une requet preparé
            //pour ce protéger d'une attaque par injection sql 
            $stmt = $con->prepare($sql);
            $stmt->execute($param);
            return $stmt;

        }else{
            // si y a pas de paramétre j'execute une requet query 
            return $con->query($sql);
        }

    }

    public function findAll($table){
       // la resquet sql pour récupérer tous les enregistrements d'une table 
        $sql = "SELECT * FROM $table ";
        // j'execute la requet non préparé
        $stmt = $this->requet($sql);
        // je recup les enregistrements en mode object et non en tableau assoc
        return $stmt->fetchAll(PDO::FETCH_OBJ);


    }

    public function add(array $tableau , string $table){
        // premier tableau vide pour stocker les key qui represente les colonne
        $colonne = [];
        // tabelau pour stocker les valeur a inserer dans la bdd 
        $valeurs = [];
        // un tableau pour stocker les params
        $params = [];

        foreach ($tableau as $key => $value) {
            $colonne [] = $key;
            $valeurs [] = ' ? ';
            $params [] = $this->netoiFormulaire($value);// je netoie l'entré du form 
        }
        // je tronsforme le tableau $colonne en string
        $string_colonne = implode("," , $colonne);
         // je tronsforme le tableau $valeurs en string
        $string_valeurs = implode(",", $valeurs);
         // je crée la requette sql 
        $sql = "INSERT INTO $table (" . $string_colonne . ") VALUES (" . $string_valeurs . " )";

        return $this->requet($sql, $params);

    }
   
    public function delete($table , $id){

        $id = $this->netoiFormulaire($id);

        $sql = "DELETE FROM $table WHERE id = $id ";

        $this->requet($sql);
    }

    public function find($table , $id)
    {
        // je netoie le param $id reçu par le formulaire
        $id = $this->netoiFormulaire($id);
      
        $sql = "SELECT * FROM $table WHERE id = $id";

        $stmt = $this->requet($sql);

        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function edit(array $tableau ,string  $table ,$id){
        // je crée un tableau pour recupérer les noms des colonnes de la table qui sont les keys du $_POST
        $colonne = [];
        // ici je stock les valeur a enregistrer sur la table
        $param = [];
        $id = $this->netoiFormulaire($id);
        foreach($tableau as $key => $value){
            $colonne[] = "$key = ? ";
            $param[] = $this->netoiFormulaire($value);
        }

        $string_colonne = implode(",", $colonne);

        $sql = "UPDATE $table SET $string_colonne WHERE id = $id";

        $this->requet($sql, $param);
    }

}