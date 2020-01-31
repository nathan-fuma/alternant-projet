<?php
include ("../includes/session.php");

$login = $login_session;
$selectionFormation = $_POST['formationChoisie'];
$selectionPromotion = $_POST['promotionChoisie'];
$selectionCompetence = $_POST['competenceChoisie'];
?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
    <tr>
        <th>Formation</th>
        <th>Promotion</th>
        <th>Compétence</th>
        <th>Apprentissage</th>
        <th>Détails</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!isset($_POST['formationChoisie'])  && !isset($_POST['promotionChoisie']) && !isset($_POST['competenceChoisie']) || $selectionFormation == null && $selectionPromotion == null && $selectionCompetence == null){
        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id
                                        AND a.competence = c.id;");
    } else if ($_POST['promotionChoisie'] != null && $_POST['formationChoisie'] != null && $selectionCompetence == null){
        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id                                        
                                        AND a.competence = c.id
                                        AND UPPER(e.promo) = UPPER('$selectionPromotion')
                                        AND UPPER(f.nom) = UPPER('$selectionFormation');");
    } else if ($_POST['promotionChoisie'] != null && $_POST['formationChoisie'] != null && $_POST['competenceChoisie'] != null){
        $competence = substr($selectionCompetence, 0, strlen($selectionCompetence) /2 );

        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id                                        
                                        AND a.competence = c.id
                                        AND UPPER(e.promo) = UPPER('$selectionPromotion')
                                        AND UPPER(f.nom) = UPPER('$selectionFormation')
                                        AND UPPER(c.nom) LIKE UPPER('$competence%');");
    } else if ($_POST['formationChoisie'] != null && $_POST['competenceChoisie'] != null && $selectionPromotion == null){
        $competence = substr($selectionCompetence, 0, strlen($selectionCompetence) /2 );

        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id                                        
                                        AND a.competence = c.id
                                        AND UPPER(c.nom) LIKE UPPER('$competence%')
                                        AND UPPER(f.nom) = UPPER('$selectionFormation');");
    } else if ($_POST['formationChoisie'] != null){
        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id
                                        AND a.competence = c.id
                                        AND UPPER(f.nom) like UPPER('$selectionFormation');");
    } else if ($_POST['promotionChoisie'] != null){
        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id                                        
                                        AND a.competence = c.id
                                        AND UPPER(e.promo) = UPPER('$selectionPromotion');");
    }else if ($_POST['competenceChoisie'] != null){
        $competence = substr($selectionCompetence, 0, strlen($selectionCompetence) /2 );

        $apprentissages = mysqli_query($link, "SELECT DISTINCT a.id, f.nom as formation, e.promo, c.nom, a.description
                                        FROM apprentissage a, competence c, directeur d, etudiant e, formation f
                                        WHERE UPPER(d.login) = UPPER('$login')
                                        AND d.id = f.directeur 
                                        AND e.formation = f.id
                                        AND a.formation = f.id
                                        AND a.competence = c.id
                                        AND UPPER(c.nom) LIKE UPPER('$competence%');");
    }

    while($row=mysqli_fetch_array($apprentissages)){
        echo '<tr>';
        echo '<td>'. $row['formation'] . '</td>';
        echo '<td>'. $row['promo'] . '</td>';
        echo '<td>'. $row['nom'] . '</td>';
        echo '<td>'. $row['description'] . '</td>';
        echo '<td class="align-items-center">
                <form action="detailsApprentissage.php" method="post">
                    <input type="hidden" name = "id" value = "'. $row['id'] .'" />
                    <input type="hidden" name = "promo" value = "'. $row['promo'] .'" />
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
