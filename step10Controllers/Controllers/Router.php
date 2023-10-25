<?php

require_once 'Controllers/ControllerAccueil.php';
require_once 'Controllers/ControllerRecette.php';
require_once 'Vue/Vue.php';

class Router
{
    private $ctrlAccueil;
    private $ctrlRecette;

    public function __construct() {
        $this->ctrlAccueil = new ControllerAccueil;
        $this->ctrlRecette = new ControllerRecette;
    }
    // Traite une requête entrante
    public function routerRequete() {
        // le try permet de tester le code transmis 
        //et le catch de gérer les erreurs d'exécution
        try {
            if (isset($_GET['action'])){
                if ($_GET['action'] == "recette") {
                    if (isset($_GET['id'])) {
                        $id = intval($_GET['id']);
                        if ($id != 0) {
                            $this->ctrlRecette->oneRecipe($id);
                        }else {
                            throw new Exception("Id non valide", 3);
                        }
                    } else {
                        throw new Exception("Id non existant", 2);
                    }
                } else {
                    throw new Exception("Action non valide", 1);
                }
            } else {
                $this->ctrlAccueil->accueil();
            }
        } catch (PDOException $e) {
            $this->erreur($e->getMessage());
        } 
    }

    public function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
}