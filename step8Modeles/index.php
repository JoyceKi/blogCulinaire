<?php
require('Controllers/Controller.php');

try {
    if (isset($_GET['action'])){
        if ($_GET['action'] == "recette") {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    oneRecipe($id);
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
        accueil();
    }
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}

?>