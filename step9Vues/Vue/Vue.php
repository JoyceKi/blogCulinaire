<?php

class Vue
{
    private $fichier;
    private $titre;

    public function __construct($action)
    {
        // on détermine le nom du fichier vue à partir de l'action
        $this->fichier = "Vue/Vue$action.php";
    }

    public function generer($donnees)
    {
        $contenu = $this->genererFichier($this->fichier, $donnees);
        $vue = $this->genererFichier('Vue/gabarit.php', [
            'titre' => $this->titre,
            'contenu' => $contenu,
        ]);
    }

    public function genererFichier($fichier,$donnees)
    {
        if (file_exists($fichier)) {
            extract($donnees);

            ob_start();

            require $fichier;

            ob_get_clean();
        } else {
            throw new Exception("Fichier.' $fichier'. introuvable");
        }
    }
}