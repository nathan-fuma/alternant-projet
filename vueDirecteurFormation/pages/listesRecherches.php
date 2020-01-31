<?php
include ("../includes/session.php");

$login = $login_session;
$selectionFormation = $_POST['formationChoisie'];
$selectionPromotion = $_POST['promotionChoisie'];

$formations = mysqli_query($link, "SELECT DISTINCT f.nom
                                             FROM directeur d, formation f 
                                             WHERE UPPER(d.login) = UPPER('$login') 
                                             AND f.directeur = d.id; ");

$promotions = mysqli_query($link, "SELECT DISTINCT e.promo 
                                         FROM etudiant e, formation f, directeur d
                                         WHERE UPPER(d.login) = UPPER('$login')
                                         AND d.id = f.directeur 
                                         AND e.formation = f.id ;");
?>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text border-0 mr-2" for="selectionFormation">Formations :</label>
    </div>
    <select class="custom-select col-xl-2" id="selectionFormation">
        <?php

        if($selectionFormation != null){
            $promotions = mysqli_query($link, "SELECT DISTINCT e.promo 
                                         FROM etudiant e, formation f, directeur d
                                         WHERE UPPER(d.login) = UPPER('$login')
                                         AND d.id = f.directeur 
                                         AND e.formation = f.id 
                                         AND UPPER(f.nom) = UPPER('$selectionFormation');");
        }

        if($formations->num_rows > 1){
            echo '<option selected value="default">Choisissez...</option>';

            while($row = mysqli_fetch_array($formations)){
                if($row['nom'] == $selectionFormation){
                    echo   '<option selected value="' . $row['nom'] . '">'.  $row['nom'] . '</option>';
                } else {
                    echo   '<option value="' . $row['nom'] . '">'.  $row['nom'] . '</option>';
                }
            }
        } else {
            while($row = mysqli_fetch_array($formations)){
                echo   '<option selected disabled>'.  $row['nom'] . '</option>';
            }
        }
        ?>
    </select>
    <div class="input-group-prepend">
        <label class="input-group-text border-0 mr-2 ml-2 " for="selectionPromotion">Promotions :</label>
    </div>
    <select class="custom-select col-xl-2" id="selectionPromotion">
        <?php
        if($promotions->num_rows > 1){
            echo '<option selected value="default">Choisissez...</option>';

            while($row = mysqli_fetch_array($promotions)){
                echo   '<option value="' . $row['promo'] . '">'.  $row['promo'] . '</option>';
            }
        } else {
            while($row = mysqli_fetch_array($promotions)){
                echo   '<option selected disabled>'.  $row['promo'] . '</option>';
            }
        }
        ?>
    </select>
</div>


