<?php

include ("../includes/session.php");

$nbrl1 = mysqli_query($link, "SELECT count(*) from etudiant e where e.promo='l1';") or die(mysqli_error($sql));
$nbrl2 = mysqli_query($link, "SELECT count(*) from etudiant e where e.promo='l2';") or die(mysqli_error($sql));
$nbrl3 = mysqli_query($link, "SELECT count(*) from etudiant e where e.promo='l3';") or die(mysqli_error($sql));
$nbrm = mysqli_query($link, "SELECT count(*) from etudiant e where e.formation=3;") or die(mysqli_error($sql));


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

<body class="">

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
                <li class="active ">
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
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-user-graduate text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Licence 1</p>
                                        <p class="card-title" id="valeuretumax">
                                            <?php while ($row2 = mysqli_fetch_array($nbrl1)) {
                                                echo $row2[0]." étudiants";
                                            }?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-user-graduate text-success"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Licence 2</p>
                                        <p class="card-title">
                                            <?php while ($row2 = mysqli_fetch_array($nbrl2)) {
                                                echo $row2[0]." étudiants";
                                            }?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-user-graduate text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Licence 3</p>
                                        <p class="card-title">
                                            <?php while ($row2 = mysqli_fetch_array($nbrl3)) {
                                                echo $row2[0]." étudiants";
                                            }?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="fas fa-user-graduate text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Master Icone</p>
                                        <p class="card-title">
                                            <?php while ($row2 = mysqli_fetch_array($nbrm)) {
                                                echo $row2[0]." étudiants";
                                            }?>
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h3 class="card-title"><i class="fas fa-chart-line mr-1"></i> Graphe des acquisitions par compétences</h3>
                            <p class="card-category">pour le Master ICONE</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="Chart"></canvas>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header ">
                            <h3 class="card-title"><i class="fas fa-chart-line mr-2"></i>Synthèse des acquisitions par compétences</h3>
                            <p class="card-category">pour la promo de Licence 3</p>
                        </div>
                        <div class="card-body ">
                            <canvas id="Chart2"></canvas>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fas fa-calendar mr-1"></i> Année : 2019/2020
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
<script src="/assets/js/core/jquery.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script defer src="/assets/fontawesome-free/js/all.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!-- Chart JS -->
<script src="/assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
<script src="../assets/js/core/chartToAdd.js"></script>
<script src="../assets/js/core/chart.min.js"></script>

<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
    });
</script>
</body>

</html>
