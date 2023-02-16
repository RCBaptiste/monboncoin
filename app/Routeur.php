<?php

namespace App;

use Controllers\AnnoncesController;
use Controllers\Controller;
use Controllers\UsersController;

class Routeur{
    public function app(){
        // On teste le routeur
        //echo "le routeur fonctionne <br>";

        // Récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        //echo $request;
        // On supprime "/coursphp/monboncoin/public de $request
        $nb = strlen(SITEBASE);
        $request = substr($request, $nb);
        //echo "<hr>";
        //echo $request;
        // On casse $request pour récupérer uniquement la route demandée et pas les param GET
        $request = explode("?", $request);
        $request = $request[0];
        //echo $request;

        // On définit les routes du projet
        switch ($request){
            case '':
                //echo "Vous êtes sur la page d'accueil";
                $accueil = AnnoncesController::accueil();
                break;
            case 'annonces':
                //echo "Vous êtes sur la page annonces";
                
                if(isset($_GET['order']) && isset($_GET['idCategorie'])){
                    $order = $_GET['order'];
                    $categorie = $_GET['idCategorie'];
                    AnnoncesController::annonces($order, $categorie);
                }
                AnnoncesController::annonces();// Toujours placer l'appel de la fonction après la condition s'il y en a une
                break;
            case 'annonceDetail':
                //echo "Vous êtes sur la page détail de l'annonce";
                if (isset($_GET['id'])){
                    $id = (int)$_GET['id'];// (int) fait que seuls les nombres entiers sont acceptés. Autrement une erreur aura lieu
                    AnnoncesController::detail($id);
                }
                break;
            case 'annonceAjout':
                //echo "page de création d'annonce";
                AnnoncesController::annonceAjout();
                break;
            case 'annonceModif':
                echo "page de modification d'annonce";
                break;
            case 'annonceSuppr':
                echo "page de suppression d'annonce";
                break;
            case 'panier':
                echo "page panier";
                break;
            case 'inscription':
                //echo "page d'inscription";
                $inscription = UsersController::inscription();
                break;
            case 'connexion':
                //echo "page de connexion";
                $connexion = UsersController::connexion();
                break;
            case 'deconnexion':
                //echo "page de deconnexion";
                unset($_SESSION['user']);
                header('Location: ' . SITEBASE);
                break;
            case 'profil':
                echo "page de profil";
                break;
            default:
                echo "Cette page n'existe pas";
                break;
        }
    }
}