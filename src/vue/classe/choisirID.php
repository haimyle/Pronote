<?php
require_once "../../bdd/Bdd.php";

$bdd = new Bdd();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <title>Academics &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/academics-master/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../../assets/academics-master/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/academics-master/css/jquery-ui.css">
    <link rel="stylesheet" href="../../../assets/academics-master/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/academics-master/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../assets/academics-master/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../../../assets/academics-master/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../../../assets/academics-master/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../../../assets/academics-master/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../../../assets/academics-master/css/aos.css">
    <link href="../../../assets/academics-master/css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../../../assets/academics-master/css/style.css">


</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <div class="py-2 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 d-none d-lg-block">
                    <a href="#" class="small mr-3"><span class="icon-question-circle-o mr-2"></span> Have a
                        questions?</a>
                    <a href="#" class="small mr-3"><span class="icon-phone2 mr-2"></span> 10 20 123 456</a>
                    <a href="#" class="small mr-3"><span class="icon-envelope-o mr-2"></span> info@mydomain.com</a>
                </div>
                <div class="col-lg-3 text-right">
                    <a href="../../../src/traitement/traitementDeconnexion.php" class="small mr-3"><span class="icon-unlock-alt"></span> Se Deconnecter</a>
                </div>
            </div>
        </div>
    </div>
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
                <div class="site-logo">
                    <a href="../../../index.php" class="d-block">
                        <img src="../../../assets/academics-master/images/logo.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>
                <div class="mr-auto">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li>
                                <a href="../../../index.php" class="nav-link text-left">Accueil</a>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link text-left">Gestion Scolaire</a>
                                <ul class="dropdown">
                                    <li class="has-children"><a href="#">Planning</a>
                                        <ul class="dropdown">
                                            <li><a href="../planning/create.php">Créer planning</a></li>
                                            <li><a href="../planning/update.php">Modifier planning</a></li>
                                            <li><a href="../planning/delete.php">Supprimer planning</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">Matière</a>
                                        <ul class="dropdown">
                                            <li><a href="../matiere/create.php">Créer planning</a></li>
                                            <li><a href="../matiere/update.php">Modifier planning</a></li>
                                            <li><a href="../matiere/delete.php">Supprimer planning</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">Classe</a>
                                        <ul class="dropdown">
                                            <li><a href="../classe/create.php">Créer planning</a></li>
                                            <li><a href="choisirID.php">Modifier planning</a></li>
                                            <li><a href="../classe/delete.php">Supprimer planning</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Our School</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link text-left">Gestion Enseignants</a>
                                <ul class="dropdown">
                                    <li><a href="read.php">Liste des enseignants</a></li>
                                    <li><a href="create.php">Inscrire compte</a></li>
                                    <li><a href="choisirID.php">Modifier compte</a></li>
                                    <li><a href="delete.php">Supprimer compte</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#" class="nav-link text-left">Gestion Étudiants</a>
                                <ul class="dropdown">
                                    <li><a href="../etudiant/read.php">Liste des étudiants</a></li>
                                    <li><a href="../etudiant/create.php">Inscrire compte</a></li>
                                    <li><a href="../etudiant/update.php">Modifier compte</a></li>
                                    <li><a href="../etudiant/delete.php">Supprimer compte</a></li>
                                </ul>
                            </li>
                        </ul>
                        </ul>
                    </nav>

                </div>
                <div class="ml-auto">
                    <div class="social-wrap">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>

                        <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </header>

    <div class="site-section ftco-subscribe-1 site-blocks-cover pb-4" style="background-image: url('../../../assets/academics-master/images/bg_1.jpg')">
        <div class="container">
            <div class="row align-items-end justify-content-center text-center">
                <div class="col-lg-7">
                    <h2 class="mb-0">Inscrire un Enseignant</h2>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <div class="custom-breadcrumns border-bottom">
        <div class="container">
            <a href="../../../index.php">Accueil</a>
            <span class="mx-3 icon-keyboard_arrow_right"></span>
            <span class="current">Gestion Enseignants</span>
        </div>
    </div>

    <div class="site-section">
        <div class="container">

            <form method="post" action="../../traitement/classe/traitementAffecter.php">
                <div class="row justify-content-center">

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="id_professeur">Enseignant</label>
                                <select class="form-control" name="id_professeur" id="id_professeur">
                                    <option></option>
                                    <?php
                                    $req = $bdd->getBdd()->query('SELECT * FROM professeur WHERE role = "professeur"');
                                    while($res=$req->fetch()){
                                        ?>
                                        <option value="<?php echo $res['id_professeur'];?>"><?php echo $res['id_professeur'].". ".$res['prenom']." ".$res['nom']." ";?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="col-md-12 form-group">
                                <label for="classe">Classe</label>
                                <?php
                                $req = $bdd->getBdd()->query('SELECT * FROM classe');
                                while ($res = $req->fetch()) {
                                    ?>
                                    <div class="col-md-12 form-check ">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $res['id_classe']; ?>" name="classe[]" id="<?php echo $res['classe']; ?>" disabled>
                                        <label class="form-check-label" for="<?php echo $res['classe']; ?>">
                                            <?php echo $res['classe']; ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <input type="submit" value="Choisir" class="btn btn-primary btn-lg px-5">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <p class="mb-4"><img src="../../../assets/academics-master/images/logo.png" alt="Image" class="img-fluid"></p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto
                        iure.</p>
                    <p><a href="#">Learn More</a></p>
                </div>
                <div class="col-lg-3">
                    <h3 class="footer-heading"><span>Our Campus</span></h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Acedemic</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Our Interns</a></li>
                        <li><a href="#">Our Leadership</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Human Resources</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h3 class="footer-heading"><span>Our Courses</span></h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Math</a></li>
                        <li><a href="#">Science &amp; Engineering</a></li>
                        <li><a href="#">Arts &amp; Humanities</a></li>
                        <li><a href="#">Economics &amp; Finance</a></li>
                        <li><a href="#">Business Administration</a></li>
                        <li><a href="#">Computer Science</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h3 class="footer-heading"><span>Contact</span></h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Support Community</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Share Your Story</a></li>
                        <li><a href="#">Our Supporters</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- .site-wrap -->

<!-- loader -->
<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#51be78"/>
    </svg>
</div>

<script src="../../../assets/academics-master/js/jquery-migrate-3.0.1.min.js"></script>
<script src="../../../assets/academics-master/js/jquery-ui.js"></script>
<script src="../../../assets/academics-master/js/popper.min.js"></script>
<script src="../../../assets/academics-master/js/bootstrap.min.js"></script>
<script src="../../../assets/academics-master/js/owl.carousel.min.js"></script>
<script src="../../../assets/academics-master/js/jquery.stellar.min.js"></script>
<script src="../../../assets/academics-master/js/jquery.countdown.min.js"></script>
<script src="../../../assets/academics-master/js/bootstrap-datepicker.min.js"></script>
<script src="../../../assets/academics-master/js/jquery.easing.1.3.js"></script>
<script src="../../../assets/academics-master/js/aos.js"></script>
<script src="../../../assets/academics-master/js/jquery.fancybox.min.js"></script>
<script src="../../../assets/academics-master/js/jquery.sticky.js"></script>
<script src="../../../assets/academics-master/js/jquery.mb.YTPlayer.min.js"></script>


<script src="../../../assets/academics-master/js/main.js"></script>

</body>

</html>