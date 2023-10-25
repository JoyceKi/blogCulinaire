<?php $titre = "Bienvenue sur le BlogCulinaire";
ob_start();
?>



<?php 
$contenu = ob_get_clean();
require('gabarit.php');
?> 