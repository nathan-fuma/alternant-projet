<?php
include ("../includes/session.php");

//Requête permettant d'afficher la liste de tous les modules :
$query1 = mysqli_query($link, "select a.description from apprentissage a;");

if(isset($_GET["apprentissage_name"])){
    $module="\"".$_GET["apprentissage_name"]."\"";
    $query2 = mysqli_query($link,"select p.nom,p.prenom from professeur p, professeur_apprentissage pa, apprentissage a where p.id=pa.professeur and pa.apprentissage=a.id and a.description=".$module.";");
}

CloseCon($link);
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
                <li>
                    <a href="etudiants.php">
                        <i class="nc-icon nc-bullet-list-67"></i>
                        <p>Liste étudiant</p>
                    </a>
                </li>
                <li class="active">
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
                            <h3 class="card-title"><i class="fas fa-chalkboard-teacher mr-1"></i> Liste des enseignants</h3>
                            <p class="card-category">par résultat d'apprentissage</p>
                        </div>
                        <div class="card-body all-icons">
                            <div id="icons-wrapper">
                                <div class="table-responsive">
                                    <div id="listes"></div>
                                    <h1 class="text-center mt-1">Enseignants par modules</h1>
                                    <p class="text-center">Choississez un module pour afficher les enseignants correspondant</p>
                                    <!--Formulaire permettant d'envoyer en méthode GET le nom du module recherché, on le récupère dans le $_GET -->
                                    <form action="" method="get" class="form-module mt-2">
                                        <div class="form-check-inline">
                                            <select class="form-control" name="apprentissage_name" id="apprentissage_name">
                                                <?php
                                                while ($row2 = mysqli_fetch_array($query1)) {
                                                    echo '<option>';
                                                    echo $row2['description'];
                                                    echo '</<option>';
                                                }
                                                ?>
                                            </select>
                                            <button class="ml-2 btn" type="submit" name="valid" content=""><i class="fas fa-search"></i> </button>
                                        </div>
                                </div>
                                </form>
                                <div id="tableau">
                                    <?php
                                    if(isset($_GET["apprentissage_name"])) {
                                        echo '<p class="mt-4"><B>' . $_GET["apprentissage_name"] . '. :</B></p>';
                                    }
                                    if(isset($_GET["apprentissage_name"])) {
                                        $cpt=0;
                                        echo '<table id="example" class="table table-striped table-bordered" style="width:100%">';
                                        echo '<thead>';
                                        echo '<tr>';
                                        echo '<th scope="col">#</th>';
                                        echo '<th scope="col">Prénom</th>';
                                        echo '<th scope="col">Nom</th>';
                                        echo '</tr>';
                                        echo '</thead>';
                                        echo '<tbody>';
                                        while ($res = mysqli_fetch_array($query2)) {
                                            echo '<tr>';
                                            echo '<th scope="row">' . $cpt++ . '</th>';
                                            echo '<td>' . $res['prenom'] . '</td>';
                                            echo '<td>' . $res["nom"] . '</td>';
                                            echo '</tr>';
                                        }
                                        echo '</tbody>';
                                        echo '</table>';

                                    }
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


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="js/allJs.js"></script>-->
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
<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
<script src="/assets/demo/demo.js"></script>
<script>
    function SelectText(element) {
        var doc = document,
            text = element,
            range, selection;
        if (doc.body.createTextRange) {
            range = document.body.createTextRange();
            range.moveToElementText(text);
            range.select();
        } else if (window.getSelection) {
            selection = window.getSelection();
            range = document.createRange();
            range.selectNodeContents(text);
            selection.removeAllRanges();
            selection.addRange(range);
        }
    }
    window.onload = function() {
        var iconsWrapper = document.getElementById('icons-wrapper'),
            listItems = iconsWrapper.getElementsByTagName('li');
        for (var i = 0; i < listItems.length; i++) {
            listItems[i].onclick = function fun(event) {
                var selectedTagName = event.target.tagName.toLowerCase();
                if (selectedTagName == 'p' || selectedTagName == 'em') {
                    SelectText(event.target);
                } else if (selectedTagName == 'input') {
                    event.target.setSelectionRange(0, event.target.value.length);
                }
            }

            var beforeContentChar = window.getComputedStyle(listItems[i].getElementsByTagName('i')[0], '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, ""),
                beforeContent = beforeContentChar.charCodeAt(0).toString(16);
            var beforeContentElement = document.createElement("em");
            beforeContentElement.textContent = "\\" + beforeContent;
            listItems[i].appendChild(beforeContentElement);

            //create input element to copy/paste chart
            var charCharac = document.createElement('input');
            charCharac.setAttribute('type', 'text');
            charCharac.setAttribute('maxlength', '1');
            charCharac.setAttribute('readonly', 'true');
            charCharac.setAttribute('value', beforeContentChar);
            listItems[i].appendChild(charCharac);
        }
    }
</script>
</body>
</html>


