<?php

namespace Controllers;

use Models\AnnoncesModel;
use Models\CategoriesModel;

class AnnoncesController extends Controller{
    // Ma première méthode pour afficher les dernières annonces mises en ligne sur la page d'accueil
    public static function accueil(){
        $annonces = AnnoncesModel::findAll("date DESC", "LIMIT 2");
        // On utilise la méthode render()
        self::render('annonces/accueil',[
            'title' => 'Bienvenue sur mon bon coin',
            'annonces' => $annonces,
            'sousTitre' => 'Les dernières annonces en ligne'
        ]);
    }

    // Méthode pour afficher les détails d'une annonce
    public static function detail(int $id){
        $annonce = AnnoncesModel::findById([$id]);
        $msg = '';
        if (!$annonce){
            $msg = "Cette annonce n'existe pas";
        }
        self::render('annonces/detail', [
            'title' => 'Détails de l\'annonce',
            'annonce' => $annonce,
            'msg' => $msg
        ]);
    }

    // Methode pour afficher toutes les annonces
    public static function annonces($order=null, $categorie=null){
        if($categorie == null){
            
            $annonces = AnnoncesModel::findAll($order);
        }else{
            //die();
            $annonces = AnnoncesModel::findByIdCat([$categorie]);
        }
        // Récupération des catégories
        $categories = CategoriesModel::findAll();
        self::render('annonces/annonces',[
            'title' => "Les annonces de mon bon coin",
            'annonces' => $annonces,
            'categories' => $categories
        ]);
    }

    //Méthode pour créer une annonce
    public static function annonceAjout(){

        //Recupérer les catégories
        $categories = CategoriesModel::findAll();

            //Traitement du formulaire
            $errMsg = "";
            if (!empty($_POST['title']) &&
                !empty($_POST['idCategorie']) &&
                !empty($_POST['price']) &&
                !empty($_POST['description']) &&
                !empty($_FILES['image'])
            ){
                // Test de la photo
                //var_dump($_FILES);
            if (($_FILES['image']['size'] < 3000000) &&
                (($_FILES['image']['type'] == 'image/jpeg') ||
                ($_FILES['image']['type'] == 'image/jpg') ||
                ($_FILES['image']['type'] == 'image/png') ||
                ($_FILES['image']['type'] == 'image/webp'))
                ){
                    // On sécurise
                    $secu = self::security();
                    // On renomme la photo
                    $photoName = uniqid() . $_FILES['image']['name'];

                    // On copie la photo sur le serveur
                    copy($_FILES['image']['tmp_name'], ROOT . "/public/img/annonces/" . $photoName);
                    //On appelle la requete d'enregistrement en Bdd
                    $user = $_SESSION['user']['id'];
                    $categorie = (int)$_POST['idCategorie'];
                    $title = $_POST['title'];
                    $price = (int)$_POST['price'];
                    $description = $_POST['description'];
                    $photoName;
                    $newAnnonce = AnnoncesModel::create([$user, $categorie, $title, $description, $price, $photoName]);
                    header('Location:' . SITEBASE);
            }else{
                $errMsg = "Image trop lourd ou mauvais format";
            }

            }elseif(!empty($_POST)){
                $errMsg = "Merci de remplir tous les champs";
            }

        self::render('annonces/ajout',[
            'title' => "Nouvelle annonce",
            'categories' => $categories,
            'errMsg' => $errMsg
        ]);
    }

    //Methode pour modifier une annonce
    public static function annonceModif($id){
        $errMsg = "";
        //On récupère les catégories
        $categories = CategoriesModel::findAll();
        // On récupère l'annonce à modifier
        $annonce = AnnoncesModel::findById([$id]);
        //var_dump($annonce);
        //die();
        !$annonce ? header('Location: annonces'): null;
        //Vérifier que l'utilisateur et admin ou que l'utilisateur est le propriétaire de l'annonce
        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['id'] == $annonce['idUser']){
            //Traitement de mon formulaire
            if (!empty($_POST['title']) &&
                !empty($_POST['idCategorie']) &&
                !empty($_POST['price']) &&
                !empty($_POST['description'])){
                    //Controle sur la photo
                    //var_dump($_FILES);
                    if (!empty($_FILES['image']['name']) &&
                    ($_FILES['image']['size'] < 3000000) &&
                (($_FILES['image']['type'] == 'image/jpeg') ||
                ($_FILES['image']['type'] == 'image/jpg') ||
                ($_FILES['image']['type'] == 'image/png') ||
                ($_FILES['image']['type'] == 'image/webp'))
                ){
                    $photoName = uniqid(). $_FILES['image']['name'];
                    copy($_FILES['image']['tmp_name'], ROOT . "/public/img/annonces/" . $photoName);
                }elseif(!empty($_FILES['image']['name'])){
                    //var_dump($_FILES['image']);
                    $errMsg = "Photo trop lourde ou mauvais format";
                }
                // On sécurise:
                self::security();
                    $categorie = (int)$_POST['idCategorie'];
                    $title = $_POST['title'];
                    $price = (int)$_POST['price'];
                    $description = $_POST['description'];
                    $idAnnonce = $annonce['idAnnonce'];
                if(isset($photoName)){
                    $data = [$categorie, $title, $description, $price,$photoName, $idAnnonce];
                }else{
                    $data = [$categorie, $title, $description, $price,$annonce['image'], $idAnnonce];
                }
                // Executer la requête
                $annonceModif = AnnoncesModel::update($data);
                header('Location:'. SITEBASE);

                }elseif(!empty($_POST)){
                        $errMsg = "Merci de remplir tous les champs a part la photo";
                }

        }else{
            header('Location: annonces');
        }
        self::render('annonces/modif',[
            'title' => 'Modification de l\'annonce',
            'annonce' => $annonce,
            'categories' => $categories,
            'errMsg' => $errMsg
        ]);
    }

    //Méthode de suppression d'annonce
    public static function annonceSup($id){
        $errMsg = "";
        $msg = "";
        // Augmenter la sécurité lors de la suppression
        //Si utilisateur appuie sur supprimer 
        //Alors chercher l'id de l'annonce
        $annonce = AnnoncesModel::findById([$id]);
        //Si existante, la sélectionner
        //Si l'annonce n'existe, l'utilisateur est renvoyé vers son profil
        //Sinon envoyer un message d'erreur
        !$annonce ? header('Location: profil'): null;
        if($_GET['operation'] == 'delete'){
            AnnoncesModel::delete([$id]);
            header('Location: profil');
        }
//Supprimer -> Supprimer l'annonce et laisser un message
//Anuller -> Retourner à sur la page de profil


    //Si vrai, renvoyer vers la page suppression de l'annonce(ou demander une confirmation)
            self::render('annonces/Sup',[
                'title' => "Suppression de l'annonce",
                'annonce' => $annonce,
                //Afficher un message d'alerte
                'msg' => $msg,
                'errMsg' => 'Etes vous sûr de vouloir supprimer cette annonce ?'
            ]);
            
        

        //AnnoncesModel::delete([$id]);
        //header('Location: profil');
        //$_SESSION['messages'] = 'Annonce supprimée';
    }
    
}

//Méthode de suppression d'annonce
/*
* Si utilisateur appuie sur supprimer
* Alors chercher l'id de l'annonce
* Si existante, la sélectionner
* Sinon envoyer un message d'erreur
* Si vrai, renvoyer vers la page suppression de l'annonce ou demander une confirmation
* Afficher un message d'alerte
* Supprimer -> Supprimer l'annonce et laisser un message
* Anuller -> Retourner à sur la page de profil
 */