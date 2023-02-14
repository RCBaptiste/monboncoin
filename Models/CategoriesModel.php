<?php

namespace Models;

use PDO;
use App\Db;

class CategoriesModel extends Db{
        // CRUD \\

    // Méthode de lecture \\
    //Trouver toutes les catégories
    public static function findAll(){
        $request = "SELECT * FROM categories";
        $response = self::getDb()->prepare($request); //Methode + sécure et + courante
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    //Trouver une catégorie par son id
    public static function findById(array $id){
        $request = "SELECT * FROM categories WHERE idCategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);
    }

    // Trouver une catégorie par son nom
    public static function findByTitle(array $title){
        $request = "SELECT * FROM categories WHERE title = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($title);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    // Methode d'écriture \\

    // Creer une catégorie \\

    public static function create(array $data){
        $request = "INSERT INTO categories (title) VALUES (?)";
        $response = self::getDb()->prepare($request);
        $response->execute($data);

        
    }

    // Méthode de modification
    public static function update(array $data){
        $request = "UPDATE categories SET title = ? WHERE idCategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($data);
    }

    // Méthode de suppression \\
    public static function delete(array $id){
        $request = "DELETE FROM categories WHERE idCategorie = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);
    }

}
