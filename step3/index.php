<?php
require('Modele.php');

$recipe = getRecipe();
$recipes = getRecipes();
$coms = getComs();

require('vueAccueil.php');
?>