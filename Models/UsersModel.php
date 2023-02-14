<?php

namespace Models;

use PDO;
use App\Db;

class UsersModel extends Db
{
    // CRUD \\

    //Méthode de lecture \\

    // Trouver tous les utilisateurs
    public static function findAll()
    {
        $request = "SELECT * FROM users";
        $response = self::getDb()->prepare($request); //Methode + sécure et + courante
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);
    }
    //Trouver un utilisateur par son id
    /**
     * Attend un id utilisateur
     * 
     * 
     */
    public static function findById(array $id)
    {
        $request = "SELECT * FROM users WHERE idUser = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($id);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    //Trouver un utilisateur en ligne
    /**
     * Attend un login d'utilisateur
     * $param array $login[string]
     */
    /*
    public static function findByLogin(array $login)
    {
        $request = "SELECT * FROM users WHERE login = ?";
        $response = self::getDb()->prepare($request);
        $response->execute($login);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
    */

    /*
    public static function findByIdOrLogin($id, $login){
        if(isset($id) || isset($login)){
            $request = "SELECT * FROM users WHERE idUsers = ? OR login = ?";
            $response = self::getDb()->prepare($request);
            $response->bindValue('idUser', $id, PDO::PARAM_INT);
            $response->bindValue('login', $login, PDO::PARAM_STR);
            $response->execute();

            
        }else{
            echo "L'id ou l'adresse e-mail n'existe pas dans la bdd";
        }
        */
        /*
        public static function findByIdOrLogin(array $data){
            if(is_int($data[0])){
                $request = "SELECT * FROM users WHERE idUser = ?";
            }else{
                $request = "SELECT * FROM users WHERE login = ?";
            }
            $response = self::getDb()->prepare($request);
            $response->execute($data);
    
            return $response->fetch(PDO::FETCH_ASSOC);
        }*/
        //Trouver un utilisateur par son login ou son id
        //Autre méthode plus courte
        /**
         * Cette méthode permet de trouver un ou des utilisateurs par n'importe quelle critère
         * elle attend un tableau associatif
         * @param arry $user["clé" => ['valeur']]
         */
        public static function findBy(array $user){
        $request = "SELECT * FROM users WHERE " . key($user) ."= ?";
        $response = self::getDb()->prepare($request);
        $response->execute(current($user));

        return $response->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Methode d'écriture \\
        // Creation d'un utilisateur
        public static function create(array $data){
            //$data est un tableau qui contient les valeurs à insérer en BDD
            $request = "INSERT INTO users (login, password, firstName, lastName, adress, cp, city) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $response = self::getDb()->prepare($request);
            $response->execute($data);
        }

        //Modification d'un utilisateur
        public static function update(array $data){
            $request = "UPDATE users SET login = ?, password = ?, firstName = ?, lastName = ?,adress = ?, cp = ?, city = ? WHERE idUser = ?";
            $response = self::getDb()->prepare($request);
            $response->execute($data);
        }

        // Méthode de suppression \\
        public static function delete(array $id){
            $request = "DELETE FROM users WHERE idUser = ?";
            $response = self::getDb()->prepare($request);
            $response->execute($id);
        }



    }
