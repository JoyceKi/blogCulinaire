<?php 
$this->titre = "Votre recette ";

?>

<div class="card col-9 ms-5">
    <img src="../images/<?= $single['rec_image']; ?>" class="card-img-top" alt="photo plat">
    <div class="card-img-overlay">
    <h5 class="card-title"><?= $single['rec_nom']; ?></h5>    
    </div>
    <div class="card mb-3">
        <ul class="list-group d-flex flex-row justify-content-evenly list-group-flush ">
            <li class="list-group-item">Temps :<?= $single['rec_temps'];?></li>
            <li class="list-group-item">Niveau de difficulté :<?= $single['rec_difficulte']; ?></li>
            <li class="list-group-item">Budget :<?= $single['rec_budget']; ?></li>
        </ul>
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Ingrédients</h6>
        <p class="card-text"><?= $single['rec_ingredients']; ?></p>
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Préparation</h6>
        <p class="card-text"><?= $single['rec_preparation']; ?></p>   
    </div>
    <div class="card mb-3 ">
        <h6 class="card-subtitle mb-2 text-body-secondary">Commentaires</h6>
        <?php
        if ($comments!=0) {
        foreach ($comments as $com) { 
        ?>
        <p class="card-text"><?= $com['com_contenu']; ?></p>
        <p class="card-text text-center"><?= $com['com_auteur']; ?></p>
        <?php }
        } else {
        echo "Il n'y a pas encore de commentaires pour cette recette.";
        }?>
    </div>
    
</div>

