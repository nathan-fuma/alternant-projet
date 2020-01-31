<?php
include ('includes/function.php');
include ('connectDB.php');

$query = mysqli_query($link, "SELECT formation.niveau,competence.nom, apprentissage.description
    FROM apprentissage
    JOIN competence ON competence.id = apprentissage.competence
    JOIN formation ON formation.id = apprentissage.formation
    WHERE formation.id=3;") or die(mysqli_error($sql));

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Master ICONE</title>

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

<!-- Masthead -->
<header class="masthead text-white text-center" id="mastheadLM">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto ">
                <h1 class="textBan">Master ICONE</h1>
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
    <div class="container mt-5">
        <h2 class="mb-5">Compétences étudiées :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/icone-ordinateur.png" alt="">
                <br>
                <?php affichagecompetences($query); ?>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Admission :</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/admission.jpg" alt="">
                <h5>Votre profil :</h5>
                <p>Vous êtes titulaire d’un Bac+3, Bac+4 ou équivalent : vous avez des connaissances de niveau licence 3 en programmation déclarative et objet, structures de données, langages du Web, réseaux et protocoles, architecture client-serveur et bases de données.</p>
                <h5>Comment candidater ? </h5>
                <p>En 1re année de Master, la sélection des candidats est réalisée sur dossier.
                    Vous souhaitez candidater en 1re année de Master
                    Vous souhaitez candidater en 2e année de Master
                    Alternance : l’accès à la1re et et à la 2e année de Master en alternance n’est définitivement acquis que lorsque vous attestez de la signature d’un contrat d’apprentissage ou d’un contrat de professionnalisation.</p>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="mb-5">Et après ?</h2>
        <div class="row">
            <div class="col-12">
                <img class="img-fluid rounded-circle mb-3" width="200" src="img/icon-footer-pro.png" alt="">
                <h5>Vous pouvez, à la suite de votre formation en master, poursuivre vos études :</h5>
                <p class="font-weight-light mb-0"><ul>
                    <li><a href="https://www.univ-larochelle.fr/Etudes-doctorales" class="list-group-item-action">Doctorat</a></li>
                </ul>
                <h5>Vous pouvez également vous orientez professionnelement vers différents secteurs d'activités : </h5>
                <p class="font-weight-light mb-0"><ul>
                    <li>Banque, assurance</li>
                    <li>Commerce, distribution</li>
                    <li>Informatique, Web, images, télécommunications</li>
                </ul>
                <p class="font-weight-light mb-0"><h5>Dans différents métiers tels que :</h5>
                <ul>
                    <li>Architecte de systèmes d’information</li>
                    <li>Gestionnaire d’applications système d’information</li>
                    <li>Ingénieur développement logiciel</li>
                    <li>Ingénieur en informatique décisionnelle</li>
                    <li>Ingénieur système informatique</li>
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
                <p class="lead mb-0">Vous souhaitez acquérir des compétences générales en informatique tout en vous spécialisant dans l’un des domaines proposés par les parcours suivants : Architecte logiciel ou Données ? <br>
                    À l’issue de ces deux parcours du master Informatique, vous saurez appréhender parfaitement l’organisation des flux numériques ainsi que la mise en place d’outils d’exploitation du patrimoine immatériel d’une entreprise ou d’une collectivité. De fait, vous pourrez traiter des problématiques de gestion et d’analyse des données, concevoir des systèmes d’information mais aussi exploiter et valoriser des contenus numériques. En tant que futur cadre en informatique, vous prendrez également connaissance des différentes méthodologies d’aide à la décision permettant d’améliorer le fonctionnement d’une organisation.</p>
                <i class="fas fa-quote-right float-right"></i>
                <br>
                <p><i class="fas fa-user mr-2"></i>Jean Loup Guillaume</p>
            </div>
        </div>
    </div>
</section>
</body>
<?php
include 'includes/footer.php'
?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</html>