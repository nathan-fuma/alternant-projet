<?php

function affichagecompetences($query){
    $nomCompetence = "";
    while ($row2 = mysqli_fetch_array($query)) {
        if($nomCompetence != $row2['nom']){
            echo '<h5>';
            echo '<i class="far fa-check-circle mr-2"></i>   ';
            echo $row2['nom'] . ':';
            echo '<br>';
        }
        echo '</h5>';
        echo '<p class="ml-4">';
        echo '<i class="fas fa-arrow-right"></i>   ';
        echo  $row2['description'];
        echo '</p>';
        $nomCompetence = $row2['nom'];
    }
}

