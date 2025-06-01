<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="INBTP">
    <meta name="keywords" content="INBTP, education, formation, batiment, travaux publics">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?> | ISTA-GM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">    <!-- Css Styles -->
    <link rel="stylesheet" href="/views/templates/front/sona/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/views/templates/front/sona/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php
        echo $header; // Include the header section
        echo $content;
    ?>
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="/views/templates/front/sona/img/footer-logo.png" alt="">
                                </a>
                            </div>
                            <p>À l'INBTP, nous formons les bâtisseurs de demain<br /> Votre avenir, notre priorité</p>
                            <div class="fa-social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Nos coordonnées</h6>
                            <ul>
                                <li>(+243) 999 888 777</li>
                                <li>contact@ista-gm.net</li>
                                <li>Kinshasa, RDC</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>Vérifier ses résultats</h6>
                            <p>Entrer votre numéro matricule.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Matricule">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="/contact">Contact</a></li>
                            <li><a href="/cgu">CGU</a></li>
                            <li><a href="/privacy">Politique de confidentialité</a></li>
                            <li><a href="/legals">Mentions légales</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and distributed by <a href="https://elmes-solution.tech" target="_blank">ELMES</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->    <!-- Js Plugins -->
    <script src="/views/templates/front/sona/js/jquery-3.3.1.min.js"></script>
    <script src="/views/templates/front/sona/js/bootstrap.min.js"></script>
    <script src="/views/templates/front/sona/js/jquery.magnific-popup.min.js"></script>
    <script src="/views/templates/front/sona/js/jquery.nice-select.min.js"></script>
    <script src="/views/templates/front/sona/js/jquery-ui.min.js"></script>
    <script src="/views/templates/front/sona/js/jquery.slicknav.js"></script>
    <script src="/views/templates/front/sona/js/owl.carousel.min.js"></script>
    <script src="/views/templates/front/sona/js/main.js"></script>
</body>

</html>
