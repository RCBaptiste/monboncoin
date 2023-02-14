<?php

namespace App;

class Routeur{
    public function app(){
        // On teste le routeur
        //echo "le routeur fonctionne <br>";

        // Récupérer l'url
        $request = $_SERVER['REQUEST_URI'];
        echo $request;
        // On supprime "/coursphp/monboncoin/public de $request
        $nb = strlen(SITEBASE);
        $request = substr($request, $nb);
        echo "<hr>";
        //echo $request;
        // On casse $request pour récupérer uniquement la route demandée et pas les param GET
        $request = explode("?", $request);
        $request = $request[0];
        //echo $request;

        // On définit les routes du projet
        switch ($request){
            case '':
                echo "Vous êtes sur la page d'accueil";
                break;
            case 'annonces':
                echo "Vous êtes sur la page annonces";
                break;
            case 'annonceDetail':
                echo "Vous êtes sur la page détail de l'annonce";
                break;
            case 'annonceAjout':
                echo "page de création d'annonce";
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
                echo "page d'inscription";
                break;
            case 'connexion':
                echo "page de connexion";
                break;
            case 'deconnexion':
                echo "page de deconnexion";
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