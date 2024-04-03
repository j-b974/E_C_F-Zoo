<?php
    if (session_status() == PHP_SESSION_NONE) {session_start();}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-secondary fontRoboto mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= $router->url('home')?>">Zoo José</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Habitat</a>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item me-4" >
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <?php if(!isset($_SESSION['utilisateur'])) : ?>
                        <a class="btn  btn-primary text-white" aria-current="page" href="<?= $router->url('connection') ?>">Connection</a>
                    <?php else : ?>
                        <a class="btn  btn-danger text-white" aria-current="page" href="<?= $router->url('deconnection') ?>">Deconnection</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>