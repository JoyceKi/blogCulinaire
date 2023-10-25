<?php
require('Modele.php');
try {
$recipe = getRecipe();
$recipes = getRecipes();
$coms = getComs();
require('vueAccueil.php');
} catch (PDOException $e) {
    $msgErreur = $e->getMessage();
    require('vueErreur.php');
}

?>