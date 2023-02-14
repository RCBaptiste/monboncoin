<?php

use Models\AnnoncesModel;

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
$data = [2,"tondeuse à gazon", "max 250m², moteur electrique", 185, "tondeuse.jpg", 4];
AnnoncesModel::update($data);
$id = [4];
AnnoncesModel::delete($id);