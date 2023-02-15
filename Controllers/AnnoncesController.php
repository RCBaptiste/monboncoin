<?php

namespace Controllers;

use Models\AnnoncesModel;

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
            'annonce' => $annonce
        
        ]);
    }
}