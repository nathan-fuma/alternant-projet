<?php
include ("../includes/session.php");

$login = $login_session;
$selectionApprentissage = $_POST['id'];
$selectionPromotion = $_POST['promo'];

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
                <li class="active ">
                    <a href="apprentissages.php">
                        <i class="nc-icon nc-chart-pie-36"></i>
                        <p>Statistiques</p>
                    </a>
                </li>
                <li>
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
                            <a class="btn btn-primary float-right card-title" href="apprentissages.php" role="button"><i class="fas fa-arrow-left mr-2"></i> Retour</a>

                            <h2 class="card-title"><i class="fas fa-percent mr-1"></i> Détails du résultat d'apprentissage</h2>

                            <p class="card-category">Pourcentage de réussite</p>
                        </div>
                        <div class="wrap mt-3 ">
                            <div id="content" class="container mb-4">
                                <div class="transpBackG p-4 rounded pb-5">
                                    <h1 class="text-center mt-1">Résultat de l'apprentissage <?php $selectionApprentissage ?></h1>
                                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Formation</th>
                                            <th>Promotion</th>
                                            <th>Apprentissage</th>
                                            <th>Taux d'acquis</th>
                                            <th>Taux d'acquisition en cours</th>
                                            <th>Taux de non acquis</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if(isset($_POST['id'])){
                                            $apprentissage = mysqli_query($link, "SELECT (SELECT DISTINCT f.niveau FROM apprentissage a, etudiant e, formation f WHERE a.id = $selectionApprentissage AND a.formation = f.id) AS promotion,
                                                                                        (SELECT f.nom FROM apprentissage a, formation f WHERE a.formation = f.id AND a.id = $selectionApprentissage) AS formation,
                                                                                        (SELECT a.description FROM apprentissage a WHERE a.id = $selectionApprentissage) AS appellation,
                                                                                        (SELECT COUNT(*) FROM etudiant e WHERE UPPER(e.promo) LIKE UPPER('$selectionPromotion')) AS nbetudiant, (SELECT count(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('a') and r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantAcquis, 
                                                                                        (SELECT COUNT(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('ea') AND r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantEnCoursAcquis, 
                                                                                        (SELECT COUNT(*) AS nbAcquis FROM resultat r, etudiant e WHERE UPPER(r.notation) = UPPER('na') AND r.apprentissage = $selectionApprentissage AND r.etudiant = e.id AND UPPER(e.promo) = UPPER('$selectionPromotion')) AS nbetudiantNonAcquis, 
                                                                                        (SELECT nbetudiantAcquis / nbetudiant *100) AS pourcentageReussite, (SELECT nbetudiantEnCoursAcquis / nbetudiant * 100) AS pourcentageEnCoursReussite, 
                                                                                        (SELECT nbetudiantNonAcquis / nbetudiant *100) AS pourcentageNonReussite;");



                                            while($row=mysqli_fetch_array($apprentissage)){
                                                echo '<tr>';
                                                echo '<td>'. $row['formation'] . '</td>';
                                                echo '<td>'. $selectionPromotion . '</td>';
                                                echo '<td>'. $row['appellation'] . '</td>';
                                                echo '<td>'. round($row['pourcentageReussite'],2) . ' %</td>';
                                                echo '<td>'. round($row['pourcentageEnCoursReussite'], 2) . ' %</td>';
                                                echo '<td>'. round($row['pourcentageNonReussite'], 2 ). ' %</td>';
                                                echo '</tr>';
                                            }

                                        }
                                        ?>
                                        </tbody>
                                    </table>
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

</body>
</html>
