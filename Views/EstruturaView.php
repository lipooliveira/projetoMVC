<?php 
define('BASE_URL', '/av3-template-mvc');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo BASE_URL; ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo BASE_URL; ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Vendor CSS Files -->
  <link href="<?php echo BASE_URL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?php echo BASE_URL; ?>/assets/css/main.css" rel="stylesheet">
  <link href="<?php echo BASE_URL; ?>/assets/css/meuknery.css" rel="stylesheet">

  <!-- Vendor JS Files -->
  <script src="<?php echo BASE_URL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/typed.js/typed.umd.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo BASE_URL; ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>

  <!-- jQuery -->
  <script src="<?php echo BASE_URL; ?>/assets/js/jquery-2.2.3.min.js"></script>
  


</head>

<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="<?php echo BASE_URL; ?>/assets/img/avatar.png" alt="" class="img-fluid rounded-circle">
        </div>

        <a href="<?php echo BASE_URL; ?>/index.php" class="logo d-flex align-items-center justify-content-center">
            <h1 class="sitename">Loja boa</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="Dashboard" class="active"><i class="bi bi-house navicon"></i> Produtos</a></li>
                <li><a href="Login"> <i class="bi bi-person navicon"></i> Entrar</a></li>
                <li><a href="Registro"> <i class="bi bi-person-plus navicon"></i> Cadastrar</a></li>
                <li><a href="Master"><i class="bi bi-people navicon"></i> Gerenciar usuários</a></li>
            </ul>
        </nav>

    </header>

    <main class="main">

        <!-- Área de Conteúdo -->
        <div class="content-wrapper" id="conteudo">
            <?php
                // Chama a view passada no controller dentro da estrutura básica do site
                $this->carregarViewEstrutura($nomeView, $dados);
            ?>
        </div>
        <!-- Fim da Área de Conteúdo -->    

    </main>

    <footer id="footer" class="footer position-relative light-background">

    <div class="container">
        <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">AV3</strong> <span>Todos os direitos reservados</span></p>
        </div>
        <div class="credits">
        Designed by <a href="https://unisuam.edu.br/">UNISUAM</a>
        </div>
    </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?php echo BASE_URL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/aos/aos.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/typed.js/typed.umd.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo BASE_URL; ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>

    <!-- jQuery -->
    <script src="<?php echo BASE_URL; ?>/assets/js/jquery-2.2.3.min.js"></script>


</body>


</html>
