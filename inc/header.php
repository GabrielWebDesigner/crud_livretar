<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Livretar</title>
    <meta name="description" content="Material da aula de pw">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo BASEURL; ?>assets/Livraria.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styles.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/styles2.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/awesome/all.min.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/fonts/all.min.css">
</head>
<style>

</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navmenu fixed-top navbar-divider mb-4">
        <div class="container-fluid p-3">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto">
                    <ul class="navbar-nav">
                        <li class="nav-item me-4 mb-0">
                            <a class="nav-link active d-flex align-items-center" href="<?php echo BASEURL; ?>">
                                <i class="fa-solid fa-house-chimney navicons"></i>
                                <h4 class="me-1 mb-0">Home</h4>
                            </a>
                        </li>
                        <li class="nav-item dropdown me-5 mb-0">
                            <a class="nav-link dropdown-toggle active d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-swatchbook navicons"></i>
                                <h4 class="me-1 mb-0">Livros</h4>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo BASEURL; ?>livros/index.php"><i class="fa-solid fa-book navicons"></i> Consultar os Livros</a></li>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>livros/add.php"><i class="fa-solid fa-address-book navicons"></i> Desapegar dos Livros</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <li class="nav-item dropdown me-5 mb-0">
                            <a class="nav-link dropdown-toggle active d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-people-roof navicons"></i>
                                <h4 class="me-1 mb-0">Comunidade</h4>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/index.php"><i class="fa-solid fa-users navicons"></i> Conhecer a Comunidade</a></li>
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <li><a class="dropdown-item" href="<?php echo BASEURL; ?>customers/add.php"><i class="fa-solid fa-user-plus navicons"></i> Fazer parte da Comunidade</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <?php if (isset($_SESSION['user'])) : ?>
                            <?php if ($_SESSION['user'] == "admin") : ?>
                                <li class="nav-item dropdown me-5 mb-0">
                                    <a class="nav-link dropdown-toggle active d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid navicons fa-user-lock"></i>
                                        <h4 class="me-1 mb-0">Usuários</h4>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios"><i class="fa-solid navicons fa-user-lock"></i> Gerenciar Usuários</a></li>
                                        <li><a class="dropdown-item" href="<?php echo BASEURL; ?>usuarios/add.php"><i class="fa-solid navicons fa-user-tie"></i> Novo Usuário</a></li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item dropdown me-5 mb-0">
                                <a class="nav-link dropdown-toggle active d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?php
                                    // Verifica se há uma foto do usuário e exibe a imagem apropriada
                                    if (!empty($_SESSION['foto']) && file_exists('usuarios/fotos/' . $_SESSION['foto'])) {
                                        echo "<img src=\"" . BASEURL . "usuarios/fotos/" . $_SESSION['foto'] . "\" class=\"fotouser me-3 mb-0 shadow p-1 bg-body rounded\" alt=\"Foto do Usuário\">";
                                    } else {
                                        echo "<img src=\"" . BASEURL . "usuarios/fotos/semimagem.jpg\" class=\"fotouser me-3 mb-0 shadow p-1 bg-body rounded\" alt=\"Foto do Usuário\">";
                                    }
                                    ?>
                                    <h4 class="me-1 mb-0">Bem-vindo </h4>
                                    <h4 class="mb-0"><?php echo htmlspecialchars($_SESSION['user']); ?>!</h4>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <!-- Link de logout -->
                                        <a class="dropdown-item" href="<?php echo BASEURL; ?>inc/logout.php">
                                            <i class="fa-solid navicons fa-person-walking-arrow-right"></i> Desconectar
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php else : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link active d-flex align-items-center" href="<?php echo BASEURL; ?>inc/login.php">
                                    <i class="fa-solid navicons fa-users"></i>
                                    <h4 class="mb-0">Login</h4>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main class="container">