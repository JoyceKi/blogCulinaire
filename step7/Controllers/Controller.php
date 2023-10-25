<?php
require('./Modele/Modele.php');

function accueil()
{
    $recipe = getRecipe();
    $recipes = getRecipes();
    $coms = getComs();
    require('./Vue/vueAccueil.php');
}

function oneRecipe($id)
{
    $single = getSingle($id);
    $comments = getComments($id);
    require('./Vue/VueRecette.php');
}

function erreur($msgErreur)
{
    require('vueErreur.php');
}