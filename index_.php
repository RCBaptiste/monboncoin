<?php
use Models\UsersModel;
use Models\AnnoncesModel;
use Models\CategoriesModel;

require_once('autoloader.php');

//Tester la méthode findAll()
//$order = "price DESC";
//$annonces= AnnoncesModel::findAll($order, "LIMIT 2");

//var_dump($annonces);

//Test de la méthode findById()
//$id = [2];
//$annonce = AnnoncesModel::findById($id);
//var_dump($annonce);

//Test de la méthode findByIdUser

//$idUser = [2];
//$annoncesUser = //AnnoncesModel::findByUSer($idUser);
//var_dump($annoncesUser);
//Test de la methode findByIdCat

//$idCategorie =[2];
//$annoncesCat = AnnoncesModel::findByIdCat($idCategorie);

//var_dump($annoncesCat);

//Test de la méthode create

//$data = [1,2,"tondeuse", "max 250m², moteur electrique", 185, "tondeuse.jpg"];
//AnnoncesModel::create($data);

// Test de la méthdoe Update()
//$data = [2,"tondeuse à gazon", "max 250m², moteur electrique", 185, "tondeuse.jpg", 4];
//AnnoncesModel::update($data);
//$id = [4];
//AnnoncesModel::delete($id);

//Test de la méthode findAll Users 
//var_dump(UsersModel::findAll());

//Test de la méthode findById Users
//$id = [2];
//var_dump(UsersModel::findById($id));

// Test de le méthode findByLogin Users

//$login = ['admin@admin.fr'];

// 2 méthodes
// 1ère méthode
//$login = ['admin@admin.fr'];
//var_dump(UsersModel::findByLogin($login));

// Ou

//var_dump(UsersModel::findByLogin(['admin@admin.fr']));
//Test de la méthode findBy() users
//$user = ['login' =>['admin@admin.fr']];
// $user = ['idUser' => [1]];
//var_dump(UsersModel::findBy($user));


//Test de la méthode create() users
//$pass = password_hash("1234", PASSWORD_DEFAULT);
//$data = ['random@gmail.com', $pass, 'Random', 'Random', 'random', 95100, 'Random'];
//UsersModel::create($data);

//Test de la méthode update() users
//$data = ['relut.baptiste@gmail.com', $pass, 'Baptiste', 'Relut', '4 rue du clos de montbreau', 77240, 'Cesson', 2];
//UsersModel::update($data);

// test de la méthode delete() users
//$id = [4];
//UsersModel::delete($id);

// test de la méthode findAll() catégories


//var_dump(CategoriesModel::findById([2]));

//echo "<hr>";

//var_dump(CategoriesModel::findAll());

//echo "<hr>";


//var_dump(CategoriesModel::findByTitle(['véhicule']));

// Test de la méthode create() categories

//CategoriesModel::create(['jouets']);

// Test de la méthode update() categories


//CategoriesModel::update(['Jeux vidéo', 6]);

//CategoriesModel::delete([6]);