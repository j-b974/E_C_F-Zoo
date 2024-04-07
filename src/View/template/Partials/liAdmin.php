<li class="nav-item">
    <a href="<?= $router->url('compte')?>" class="nav-link text-white <?= $activeGestion ?? "" ?>" aria-current="page">
        <i class="bi bi-people me-2"></i>
        gestion de comptes
    </a>
</li>
<li class="nav-item">
    <a href="<?= $router->url('service')?>" class="nav-link text-white <?= $activeGestionService ?? "" ?>" aria-current="page">
        <i class="bi bi-basket3 me-2"></i>
        gestion de services
    </a>
</li>