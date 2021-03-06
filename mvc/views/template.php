<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content=<?= $description ?>>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">

    <!-- FONTS -->
    <script src="https://kit.fontawesome.com/94e02723f8.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Tiny MCE -->
    <script src="https://cdn.tiny.cloud/1/zxzv60b5q0gc5d3wbi9ezdafwuzak7bbql5pmuzmxut75dr8/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#chapter'
      });
    </script>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-black" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Jean Forteroche</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?action=home">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?action=chapters&amp;id=<?=$_SESSION["firstChapter"]?>">Chapitres</a>
                </li>
                <?php
                if (isset($_SESSION["adminLogin"]))
                {
                ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?action=adminChapter&amp;id=<?=$_SESSION["firstChapter"]?>">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?action=logout"><i class="fas fa-sign-out-alt"></i> Se deconnecter</a>
                </li>
                <?php
                }
                else
                {
                ?>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="index.php?action=admin"><i class="fas fa-sign-in-alt"></i> Se connecter</a>
                </li>
                <?php
                }
                ?> 
                </ul>
            </div>
        </div>
    </nav>
    
    <div id="page-container">
        <?= $content ?> 
    </div>
    

    <!-- Footer -->
    <footer id="footer" class="bg-black small text-center text-white-50 sticky-bottom">
        <div id="footer-first-div">
            <div>
                <p>CONTACT</p>
                <ul class="list-unstyled">
                    <li><a href="mailto:jeanforteroche@fictif.fr"><i class="far fa-envelope"></i> jeanforteroche@fictif.fr</a></li>
                </ul>
            </div>
            <div>
                <p>RESEAUX SOCIAUX</p>
                <ul class="list-unstyled">
                    <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                </ul>
            </div>
            <div>
                <p>INFOS UTILES</p>
                <ul class="list-unstyled">
                    <li><a href="#">Mentions légales</a></li>
                    <li><a href="#">Politique de confidentialité</a></li>
                </ul>
            </div>
        </div>
        
        <div class="container pt-3">
            Copyright &copy; Your Website 2019
        </div>
    </footer>

    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="public/js/script.js"></script>

</body>
</html>