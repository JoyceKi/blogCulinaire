<?php
require('Modele.php');

try {

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        if ($id!=0) {
            $single = getSingle($id);
            $comments = getComments($id);
            
            require('vueRecette.php');   
        } else {
            throw new Exception("Identifiant recette incorrect");
        }   
    } else {
        throw new Exception("Il n'y a pas de recette correspodante");
    }
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require ('vueErreur.php');
}
