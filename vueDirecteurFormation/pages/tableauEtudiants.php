<?php
require ("../includes/session.php");
$login = $login_session;
$selectionFormation = $_POST['formationChoisie'];
$selectionPromotion = $_POST['promotionChoisie'];
?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Nom et Prénom</th>
        <th>Numéro d'Étudiant</th>
        <th>Formation</th>
        <th>Promotion</th>
        <th>Détails</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!isset($_POST['formationChoisie'])  && !isset($_POST['promotionChoisie']) || $selectionFormation == null && $selectionPromotion == null){
        $etudiants = mysqli_query($link, "SELECT e.id, e.nom, e.prenom, f.nom as formation, e.promo
                                        FROM etudiant e, formation f, directeur d
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id;");
    }
    else if ($_POST['promotionChoisie'] != null && $_POST['formationChoisie'] != null){
                $etudiants = mysqli_query($link, "SELECT e.id, e.nom, e.prenom, f.nom as formation, e.promo
                                        FROM etudiant e, formation f, directeur d
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id 
                                        AND UPPER(f.nom)  = UPPER('$selectionFormation')
                                        AND UPPER(e.promo)  = UPPER('$selectionPromotion');");
    }
    else if ($_POST['formationChoisie'] != null){
        $etudiants = mysqli_query($link, "SELECT e.id, e.nom, e.prenom, f.nom as formation, e.promo
                                        FROM etudiant e, formation f, directeur d
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id 
                                        AND UPPER(f.nom)  = UPPER('$selectionFormation');");
    }
    else if ($_POST['promotionChoisie'] != null){
        $etudiants = mysqli_query($link, "SELECT e.id, e.nom, e.prenom, f.nom as formation, e.promo
                                        FROM etudiant e, formation f, directeur d
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id 
                                        AND UPPER(e.promo)  = UPPER('$selectionPromotion');");
    }

    while($row=mysqli_fetch_array($etudiants)){
        echo '<tr>';
        echo '<td>'. $row['nom'] . ' ' . $row['prenom'] .'</td>';
        echo '<td>'. $row['id'] . '</td>';
        echo '<td>'. $row['formation'] . '</td>';
        echo '<td>'. $row['promo'] . '</td>';
        echo '<td class="align-items-center">
                            <form action="details.php" method="post">
                                <input type="hidden" name = "nom" value = "'. $row['nom'] .'" />
                                <input type="hidden" name = "prenom" value = "'. $row['prenom'] .'" />
                                <input type="hidden" name = "id" value = "'. $row['id'] .'" />
                                <input class="btn btn-outline-primary" type="submit" value="Détails">
                            </form>
                          </td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table

<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/filter.js"></script>
<script src="../assets/js/core/datatables.js"></script>
