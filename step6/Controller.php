<?php
require('Modele.php');

function accueil()
{
    $recipe = getRecipe();
    $recipes = getRecipes();
    $coms = getComs();
    require('vueAccueil.php');
}

function oneRecipe($id)
{
    $single = getSingle($id);
    $comments = getComments($id);
    require('VueRecette.php');
}

function erreur($msgErreur)
{
    require('vueErreur.php');
}