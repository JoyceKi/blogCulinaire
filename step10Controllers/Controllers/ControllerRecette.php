<?php

require_once './Modele/Recette.php';
require_once './Modele/Commentaire.php';
require_once './Vue/Vue.php';

class ControllerRecette
{
    private $recette;
    private $commentaire;

    public function __construct()
    {
        $this->recette = new Recette();
        $this->commentaire = new Commentaire();
    }

    // Affiche la recette choisie
    public function oneRecipe($id)
    {
        $single = $this->recette->getSingle($id);
        $comments = $this->commentaire->getComments($id);
        $vue = new Vue("Recette");
        $vue->generer(array('single' => $single, 'comments' => $comments));
    }
}