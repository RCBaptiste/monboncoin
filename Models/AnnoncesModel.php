<?php

namespace Models;

use PDO;
use App\Db;

class AnnoncesModel extends Db
{

    ///////////////////////// Création du CRUD //////////////////////////////////////

    ///////////////// READ ////////////////////////// 

    // Méthode pour trouver toutes les annonces
    public static function findAll($order = null, string $limit = null)
    {
        // Méthode longue
        // if($order === null){
        //     $request = "SELECT * ,annonces.title AS title, categories.title AS nameCat FROM annonces INNER JOIN categories ON annonces.idCategorie = categories.idCategorie" . $limit;
        // }else{
        //     $request = "SELECT * ,annonces.title AS title, categories.title AS nameCat FROM annonces INNER JOIN categories ON annonces.idCategorie = categories.idCategorie ORDER BY " . $order . " " .$limit;
        // }

        // Même chose mais plus propre
        $request = "SELECT * ,annonces.title AS title, categories.title AS nameCat FROM annonces INNER JOIN categories ON annonces.idCategorie = categories.idCategorie";
        // if($order !==null){
        //     $request .= " ORDER BY " . $order;
        // }
        // if($limit !==null){
        //     $request .= " " . $limit;
        // }

        // Même chose mais en ternaire
        $order ? $request .= " ORDER BY " . $order : null;
        $limit ? $request .= " " . $limit : null;
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour trouver une annonce par son id
    public static function findById($id)
    {
        $request = "SELECT * FROM annonces WHERE idAnnonce = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    // Méthode pour trouver toutes lesannonces d'un user
    public static function findByUser($idUser)
    {
        $request = "SELECT * ,annonces.title AS title, categories.title AS nameCat FROM annonces INNER JOIN categories ON annonces.idCategorie = categories.idCategorie WHERE idUser = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($idUser);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour trouver les Annoces d'une catégorie
    public static function findByIdCat($idCategorie, $order = null)
    {
        $request = "SELECT *,annonces.title AS title, categories.title AS nameCat FROM annonces INNER JOIN categories ON annonces.idCategorie = categories.idCategorie WHERE annonces.idCategorie = ?";
        $order ? $request .= " ORDER BY " . $order : null;
        $response = self::getDb()->prepare($request);
        $response->execute($idCategorie);

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    /////////////////////// CREATE /////////////////////////////////

    // Méthode de création d'une annonce
    public static function create(array $data)
    {
        // $data est un tableau qui contient les valeurs à inserer en BDD
        // "INSERT INTO annonces (idUser, idCategorie, title, description, price, image) VALUES (1, 2, tondeuse, max 250 m², 150, tondeuse.jpg)
        $request = "INSERT INTO annonces (idUser, idCategorie, title, description, price, image) VALUES (?, ?, ?, ?, ?, ?)";
        $response = self::getDb()->prepare($request);
        $response->execute($data);
    }

    /////////////////////// UPDATE /////////////////////////////////
    /**
     * Méthode de mise à jour d'une annonce
     * @param array $data[
     * idCategorie: int,
     * title: string,
     * description: string,
     * price: int,
     * image: string,
     * idAnnonce: int
     * ]
     * 
     * 
     */
    public static function update($data)
    {
        $request = "UPDATE annonces SET idCategorie = ?, title = ?, description = ? , price = ?, image = ? WHERE idAnnonce = ?";
        $response = self::getDb()->prepare($request);

        return $response->execute($data);
    }

    /////////////////////// DELETE /////////////////////////////////
    public static function delete(array $id)
    {
        $request = "DELETE FROM annonces WHERE idAnnonce = ?";
        $response = self::getDb()->prepare($request);

        return $response->execute($id);
    }
}
