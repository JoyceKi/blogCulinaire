<?php
function getBdd()
{
    $username = "root";
    $password = "";
    $dsn = "mysql:host=localhost; dbname=bdd_blog_culinaire; port=3306; charset=utf8";
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $db;
}

function getRecipe()
{
    $db = getBdd();
    $sqlRecipe = "SELECT * FROM t_recipe ORDER BY RAND() LIMIT 1";
    $recipe = $db->prepare($sqlRecipe);
    $recipe->execute();
    return $recipe->fetch();
    $db = null;
}

function getRecipes()
{
    $db = getBdd();
    $sqlRecipes = "SELECT * FROM t_recipe ORDER BY rec_id DESC LIMIT 3";
    $recipes = $db->prepare($sqlRecipes);
    $recipes->execute();
    return $recipes->fetchAll();
    $db = null;

}

function getComs()
{
    $db = getBdd();
    $sqlComs = "SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3";
    $coms = $db->prepare($sqlComs);
    $coms->execute();
    return $coms->fetchAll();
    $db = null;
}

function getSingle($id)
{
    $db = getBdd();
    $sqlSingle = ("SELECT * FROM t_recipe WHERE rec_id = ?");
    $req = $db->prepare($sqlSingle);
    $req->bindValue(1, $id, pdo::PARAM_INT);
    $req->execute();
    $single = $req->fetch();
    return $single;
    $db = null;
}

function getComments($id)
{
    $db = getBdd();
    $sqlComments = ("SELECT * FROM t_comment WHERE id_rec = ?");
    $req = $db->prepare($sqlComments);
    $req->bindValue(1, $id, pdo::PARAM_INT);
    $req->execute();
    if ($req->rowCount()) {
        $comments = $req->fetchAll();
        return $comments;
    } else {
        $comments = 0;
        return $comments;
    }
    
    
    $db = null;
}
?>