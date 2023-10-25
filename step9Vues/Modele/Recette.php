<?php
require_once 'Modele.php';
class Recette extends Modele
{

     public function getRecipe()
{
    $sql = "SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1";
    $recipe = $this->executerRequete($sql);
    $recipe->execute();
    return $recipe->fetch();
}


function getRecipes()
{
    $sql = "SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3";
    $recipes = $this->executerRequete($sql);
    return $recipes->fetchAll();
}

public function getSingle($idSingle)
{
    $sql = ("SELECT * FROM t_recipe WHERE rec_id = ?");
    $single = $this->executerRequete($sql, array($idSingle));
    if ($single->rowCount() == 1) {
       return $single->fetch();
    } else {
        throw new Exception("Aucune recette ne correspond à l'identifiant");
    }  
}

}