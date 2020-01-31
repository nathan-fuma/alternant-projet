<?php
    include ('includes/function.php');
    include ('connectDB.php');

    $query2 = mysqli_query($link, "SELECT formation.niveau,competence.nom, apprentissage.description
    FROM apprentissage
    JOIN competence ON competence.id = apprentissage.competence
    JOIN formation ON formation.id = apprentissage.formation
    WHERE formation.id=1;") or die(mysqli_error($sql));


    $query3 = mysqli_query($link,"SELECT formation.niveau,competence.nom, apprentissage.description FROM apprentissage
    JOIN competence ON competence.id = apprentissage.competence
    JOIN formation ON formation.id = apprentissage.formation
    WHERE formation.id=2;");
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Licence informatique</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<?php
include 'includes/navbar.php'
?>
<body>

<nav class="navbar navbar-light bg-light sticky-top">
    <div class="container justify-content-center">
        <div class="row align-items-center">
            <a class="nav-link text-dark col2" data-toggle="collapse" href="#collapseL1L2" role="button" aria-expanded="false" aria-controls="collapseL1L2">Licence 1/2</a>
            <a class="nav-link text-dark col" data-toggle="collapse" href="#collapseL3" role="button" aria-expanded="false" aria-controls="collapseL3">Licence 3</a>
        </div>
    </div>
</nav>

<!-- Masthead -->
<header class="masthead text-white text-center" id="mastheadLM">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto ">
                <h1 class="textBan">La Licence informatique</h1>
            </div>
        </div>
    </div>
</header>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">

            <div class="col-lg-6 order-lg-2 mt-3 text-white showcase-img">
                <?php include('chartToAdd.php') ?>
            </div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Graphe des compétences de la formation informatique</h2>
                <p class="lead mb-0">Vous pouvez voir ici les domaines de compétences les plus vues durant votre formation en licence (L1/L2,  L3) ainsi qu'en Master.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials bg-light" id="testimonials1">
    <div class="container">
        <h2 class="mb-5">Les objectifs de la formation :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/computer-icons-business-education-doctorate-master-s-degree-cv.jpg" alt="">
                <h5>À l’Université, quelle que soit votre formation, les années sont découpées en semestres.
                    <br>
                    Chaque semestre, vous devrez valider un nombre d'acquis dans différents résultats d'apprentissage, séparé en 3 catégories :</h5>
                <p class="font-weight-light mb-0"><ul>
                    <li>3 UE « majeures » : elles correspondent à la discipline d'inscription de votre formation.</li>
                    <li>1 UE « mineure » : elle correspond soit à la discipline de votre majeure soit à une autre discipline de votre choix. C’est à vous de décider.</li>
                    <li>1 UE transversale : suivie par tous les étudiants de l’Université, elle correspond à des cours de langues, d’informatique d’usage, de préprofessionnalisation, bref, tout ce qui fera de vous un futur candidat recherché sur le marché de l’emploi.</li>
                </ul></p>
            </div>
        </div>
    </div>
    <div class="container mt-5 collapse" id="collapseL1L2">
        <h2 class="mb-5">Compétences étudiées L1/L2 :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/icone-ordinateur.png" alt="">
                <br>
                <?php affichagecompetences($query2); ?>
            </div>
        </div>
    </div>
    <div class="container mt-5 collapse" id="collapseL3">
        <h2 class="mb-5">Compétences étudiées L3 :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/icone-ordinateur.png" alt="">
                <br>
                <?php affichagecompetences($query3); ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Admission :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/admission.jpg" alt="">
                <h5>Votre profil :</h5>
                Vous êtes titulaire du Bac, Bac+1, Bac+2 (ou équivalent)

            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Et après ?</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/icon-footer-pro.png" alt="">
                <h5>Vous pouvez, à la suite de votre formation en licence, poursuivre vos études :</h5>
                <p class="font-weight-light mb-0"><ul>
                    <li><a href="https://formations.univ-larochelle.fr/lp-developpeur-web-full-stack" class="list-group-item-action">Licence professionnelle Métiers de l’informatique : applications Web parcours Développeur full stack</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/lp-web-designer-integrateur" class="list-group-item-action">Licence professionnelle Métiers de l’informatique : applications Web parcours Web designer intégrateur</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/lp-developpeur-mobile-iot" class="list-group-item-action">Licence professionnelle Métiers de l’informatique : conception, développement et tests de logiciels parcours Développeur mobile et IoT</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/master-informatique-architecte-logiciel" class="list-group-item-action">Master Informatique parcours Architecte logiciel</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/master-informatique-donnees" class="list-group-item-action">Master Informatique parcours Données</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/master-professorat-ecoles" class="list-group-item-action">Master Métiers de l’enseignement, de l’éducation et de la formation, 1er degré parcours Professorat des écoles</a></li>
                    <li><a href="https://formations.univ-larochelle.fr/master-management-administration-entreprises" class="list-group-item-action">Master Management et administration des entreprises</a></li>
                </ul>
                <h5>Vous pouvez également vous orientez professionnelement vers différents secteurs d'activités : </h5>
                <p class="font-weight-light mb-0"><ul>
                    <li>Banque, assurance</li>
                    <li>Informatique, Web, images, télécommunications</li>
                </ul>
                <p class="font-weight-light mb-0"><h5>Dans différents métiers tels que :</h5>
                <ul>
                    <li>Administrateur réseaux</li>
                    <li>Concepteur informatique</li>
                    <li>Développeur informatique</li>
                    <li>Formateur en informatique</li>
                    <li>Professeur des écoles</li>
                    <li>Webmestre, webdesigner</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Le mot du responsable...</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/images.png" alt="">
                <br>
                <i class="fas fa-quote-left"></i>
                <br>
                <p class="lead mb-0">Vous souhaitez acquérir un socle de connaissances et de compétences nécessaires en systèmes informatiques et en méthodes de conception et de développement de logiciels et de médias numériques ?
                    La licence informatique est faite pour vous.
                    A l’issue de cette licence, vous pourrez poursuivre en master ou choisir de vous insérer dans la vie professionnelle.</p>
                <i class="fas fa-quote-right float-right"></i>
                <br>
                <p><i class="fas fa-user mr-2"></i> Jean François Viaud</p>
            </div>
        </div>
    </div>
</section>


<?php
include 'includes/footer.php'
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>