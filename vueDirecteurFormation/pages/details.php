<?php
include ("../includes/session.php");

$table = mysqli_query($link, "SELECT DISTINCT(A.description) as apprentissage, R.notation as notation
                                          FROM competence C, apprentissage A, categorie_apprentissage CA, categorie CAT, resultat R, etudiant E
                                          WHERE C.id = A.competence
                                          AND A.id = CA.apprentissage
                                          AND CA.categorie = CAT.id
                                          AND A.id = R.apprentissage
                                          AND R.etudiant = E.id
                                          AND E.id = ".$_POST['id'].";");

$lignes = mysqli_query($link, "SELECT DISTINCT C.nom as competence, A.description as apprentissage
                                          FROM competence C, apprentissage A, categorie_apprentissage CA, categorie CAT, resultat R, etudiant E
                                          WHERE C.id = A.competence
                                          AND A.id = CA.apprentissage
                                          AND CA.categorie = CAT.id
                                          AND A.id = R.apprentissage
                                          AND R.etudiant = E.id
                                          AND E.id = ".$_POST['id'].";");

$nbacquis = mysqli_query($link, "SELECT count(resultat.apprentissage) as pourcentA
FROM resultat
JOIN etudiant ON etudiant.id = resultat.etudiant
WHERE etudiant.id= ". $_POST['id'] ."  AND notation='A';") or die(mysqli_error($sql));

$nbencours = mysqli_query($link, "SELECT count(resultat.apprentissage) as pourcentEA
FROM resultat
JOIN etudiant ON etudiant.id = resultat.etudiant
WHERE etudiant.id= ". $_POST['id'] ."  AND notation='EA';") or die(mysqli_error($sql));

$nbnonacquis = mysqli_query($link, "SELECT count(resultat.apprentissage) as pourcentNA
FROM resultat
JOIN etudiant ON etudiant.id = resultat.etudiant
WHERE etudiant.id= ". $_POST['id'] ."  AND notation='NA';") or die(mysqli_error($sql));

$nom_prenom_pourcentage = mysqli_query($link, "SELECT (SELECT etudiant.nom FROM etudiant WHERE etudiant.id=". $_POST['id'] .") as nomEtudiant, 
(SELECT etudiant.prenom FROM etudiant WHERE etudiant.id= ". $_POST['id'] .") as prenomEtudiant, 
(SELECT count(resultat.apprentissage) FROM resultat JOIN etudiant ON etudiant.id = resultat.etudiant WHERE etudiant.id= ". $_POST['id'] ." AND 
notation='A') as nbAcquis, (SELECT count(resultat.apprentissage) FROM resultat JOIN etudiant ON etudiant.id = resultat.etudiant
 WHERE etudiant.id= ". $_POST['id'] .") as nbApprentissage, (select ROUND(nbAcquis/nbApprentissage *100)) as pourcentageReussite;") or die(mysqli_error($sql));

$pourcentageCompetence = mysqli_query($link, "SELECT (SELECT COUNT(apprentissage.id) FROM competence,apprentissage WHERE apprentissage.competence=competence.id AND competence.nom='Développer un logiciel') as nbValidation,
(select count(resultat.apprentissage) as nbAcquis FROM resultat,competence,apprentissage WHERE apprentissage.competence=competence.id AND apprentissage.id=resultat.apprentissage AND competence.nom='Développer un logiciel' AND resultat.notation='A' )as nbAcquisApprentissage, 
(select ROUND(nbAcquisApprentissage/nbValidation *100)) as pourcentageReussite");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Directeur de formation
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/fontawesome-free/css/all.css" rel="stylesheet" />
    <link href="/assets/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>


<body>

<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
      -->
        <div class="logo">
            <a href="index.php" class="simple-text logo-normal">
                <p class="fas fa-user ml-2 mr-1"></p>
                <?php echo $login_nom;
                echo " ";
                echo $login_prenom;
                ?>
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li>
                    <a href="index.php">
                        <i class="nc-icon nc-bank"></i>
                        <p>Accueil</p>
                    </a>
                </li>
                <li>
                    <a href="apprentissages.php">
                        <i class="nc-icon nc-chart-pie-36"></i>
                        <p>Statistiques</p>
                    </a>
                </li>
                <li class="active ">
                    <a href="etudiants.php">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Liste étudiant</p>
                    </a>
                </li>
                <li>
                    <a href="prof_par_module.php">
                        <i class="nc-icon nc-tag-content"></i>
                        <p>Enseignants module</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <p class="navbar-brand"><i class="fas fa-wrench mr-2"></i>Gestionnaire de formation</p>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="../includes/logout.php" class="btn btn-outline-dark">Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-lg">

    <canvas id="bigDashboardChart"></canvas>


  </div> -->

        <div class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card demo-icons">
                        <div class="card-header">
                            <a class="btn btn-primary float-right card-title" href="etudiants.php" role="button"><i class="fas fa-arrow-left mr-2"></i> Retour</a>
                            <?php while ($rowAfficherPourcent = mysqli_fetch_array($nom_prenom_pourcentage)) { ?>
                            <h2 class="card-title"><i class="fas fa-user-graduate mr-2"></i>
                                <?php
                                echo $rowAfficherPourcent['nomEtudiant'] . '  ';
                                echo $rowAfficherPourcent['prenomEtudiant'] . '  ';
                                ?>
                            </h2>
                            <p class="card-category">Résultats de l'étudiant</p>
                        </div>
                        <div class="wrap">
                            <div id="content" class="container">
                                <div class="transpBackG  rounded pb-5">
                                    <h5 class="align-items-center"><i class="fas fa-check mr-2"></i>Pourcentage d'aquisition : <?php echo $rowAfficherPourcent['pourcentageReussite'] . '% de resultats acquis'; }?></h5>

                                    <div class="row align-items-center ml-1">
                                        <table class="table table-sm col-6">
                                            <thead>
                                            <tr>
                                                <th scope="col">Niveau</th>
                                                <th scope="col">Couleur</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="col-md-10">Acquis</td>
                                                <td class="bg-success col-md-2"></td>
                                            </tr>
                                            <tr>
                                                <td>En cours d'Acquisition</td>
                                                <td class="bg-warning"></td>
                                            </tr>
                                            <tr>
                                                <td>Non Acquis</td>
                                                <td class="bg-danger"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div style="" hidden="true">
                                            <table>
                                                <?php
                                                while($rownbacquis = mysqli_fetch_array($nbacquis)){
                                                    echo '<tr><td id="acquis">'.$rownbacquis['pourcentA'].'</td><tr>';
                                                }
                                                while($rownbencours = mysqli_fetch_array($nbencours)){
                                                    echo '<tr><td id="encours">'.$rownbencours['pourcentEA'].'</td><tr>';
                                                }
                                                while($rownbnonacquis = mysqli_fetch_array($nbnonacquis)){
                                                    echo '<tr><td id="nonacquis">'.$rownbnonacquis['pourcentNA'].'</td><tr>';
                                                }
                                                ?>
                                            </table>
                                        </div>
                                        <div style="" class="col-6">
                                            <div class="card-header ">
                                                <h5 class="card-title"><i class="fas fa-chart-pie mr-1"></i>Graphe des acquisitions</h5>
                                            </div>
                                            <div class="card-body">
                                                <canvas id="bigDashboardChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $enumTable = Array();
                                    $enumPourcentageCompetence = Array();
                                    $i = 0;
                                    while($rowT = mysqli_fetch_array($table)){
                                        $enumTable[$i] = $rowT;
                                        $i++;
                                    }
                                    $i=0;
                                    while($rowPC = mysqli_fetch_array($pourcentageCompetence)){
                                        $enumPourcentageCompetence[$i] = $rowPC;
                                        $i++;
                                    }


                                    ?>
                                    <?php
                                    $competence = "";
                                    while($rowLignes = mysqli_fetch_array($lignes)) {
                                        if ($competence != $rowLignes['competence']) {
                                            echo '<table class="table table-sm table-striped table-header-rotated mb-3 mt-2">';
                                            echo '<thead>';
                                            echo '<tr>';
                                            echo '<th scope="row" class="row-header col-md-10">' . $rowLignes['competence'] . '</th>';
                                            echo '<th scope="col-md-2"<div><span>Etat de l\'acquis</span></div></th>';
                                            echo '</tr>';
                                            echo '</thead>';
                                            echo '<tbody>';
                                            $competence = $rowLignes['competence'];
                                        }
                                        echo '<tr>';

                                        echo '<td scope="row" class="row-header">' . $rowLignes['apprentissage'] . '</td>';

                                        foreach ($enumTable as $rowTable) {
                                            if ($rowLignes['apprentissage'] == $rowTable['apprentissage']) {
                                                switch ($rowTable['notation']) {
                                                    case "A":
                                                        echo '<td class="bg-success table-bordered"></td>';
                                                        break;
                                                    case "EA":
                                                        echo '<td class="bg-warning table-bordered"></td>';
                                                        break;
                                                    case "NA":
                                                        echo '<td class="bg-danger table-bordered"></td>';
                                                        break;
                                                }
                                            }
                                        }
                                        echo '</tr>';
                                    }
                                    echo '</tbody>';
                                    echo '</table>';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include ("../includes/footer.php")?>
    </div>
</div>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script defer src="/assets/fontawesome-free/js/all.js"></script>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/core/allJs.js"></script>
<script defer src="../assets/js/core/allJs.js"></script>
<script src="../assets/js/core/filter.js"></script>
<script src="../assets/js/core/chart.min.js"></script>
<script src="../assets/js/core/chartToAdd.js"></script>

</body>
</html>
