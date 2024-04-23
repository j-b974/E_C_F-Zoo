<li class="nav-item">
    <a href="<?= $router->url('compte')?>" class="nav-link text-white <?= $activeGestion ?? "" ?>" aria-current="page">
        <i class="bi bi-people me-2"></i>
        gestion de comptes
    </a>
</li>
<li class="nav-item">
    <a href="<?= $router->url('habitat')?>" class="nav-link text-white <?= $activeHabitat ?? "" ?>" aria-current="page">
        <i class="bi bi-bank me-2"></i>
        gestion Habitats annimaux
    </a>
</li>
<li class="nav-item">
    <a href="<?= $router->url('annimaux')?>" class="nav-link text-white <?= $activeAnnimaux ?? "" ?>" aria-current="page">
        <i class="bi bi-github me-2"></i>
        gestion annimaux
    </a>
</li>