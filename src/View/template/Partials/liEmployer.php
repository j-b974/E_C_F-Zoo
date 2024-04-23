
<li class="nav-item">
    <a href="#" class="nav-link text-white <?= $activeModifService ?? "" ?>">
        <i class="bi bi-card-text me-2"></i>
        Services du Zoo
    </a>
</li>
<li class="nav-item">
    <a href="<?= $router->url('compteRenduEmploye')?>" class="nav-link text-white <?= $activeEmployerCompteRendu ?? "" ?>">
        <i class="bi bi-clipboard2-plus me-2"></i>
        Compte Rendus Employer
    </a>
</li>