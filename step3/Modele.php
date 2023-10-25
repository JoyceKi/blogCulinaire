<?php
function getRecipe()
{
try {
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlRecipe = $db->query('SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1');
    $recipe = $sqlRecipe->fetch();
    return $recipe;
    $db = null;

} catch (PDOException $e) {
    //throw $th;
}
}

function getRecipes()
{
try {
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlRecipes = $db->query('SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3');
    $recipes = $sqlRecipes->fetchAll();
    return $recipes;
    $db = null;

} catch (PDOException $e) {
    //throw $th;
}
}

function getComs()
{
try {
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlComs = $db->query('SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3');
    $coms = $sqlComs->fetchAll();
    return $coms;
    $db = null;

} catch (PDOException $e) {
    //throw $th;
}
}

?>