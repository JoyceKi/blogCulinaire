<?php
require_once 'Modele/Modele.php';
class Commentaire extends Modele
{   
function getComs()
{
    $sql = "SELECT * FROM t_comment AS C INNER JOIN t_recipe AS R ON C.id_rec = R.rec_id ORDER BY com_id ASC LIMIT 3";
    $coms = $this->executerRequete($sql);
    return $coms->fetchAll();
}
 
function getComments($idComs)
{
    $sql = ("SELECT * FROM t_comment WHERE id_rec = ?");
    $comments = $this->executerRequete($sql, array($idComs));
    if ($comments->rowCount() == 1) {
        return $comments->fetchAll();
    } else {
        $comments = "Soyez le premier à commenter cette recette";
        return $comments;
    }   
    
}
}