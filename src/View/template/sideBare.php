<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark fontRoboto card-sidBare " style="min-width: 325px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto ">
        <li class="nav-item">
            <a href="#" class="nav-link text-white <?= $activeVisiteur ?? "" ?>" >
                <i class="bi bi-calendar2-minus me-2"></i>
                Avis Visiteurs
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white <?= $activeService ?? "" ?>">
                <i class="bi bi-card-text me-2"></i>
                Services du Zoo
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $router->url('comptRenduVeto')?>" class="nav-link text-white <?= $activeVeterinaire ?? "" ?>">
                <i class="bi bi-clipboard2-plus me-2"></i>
                Compte Rendus Vétérinaire
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white">
                <i class="bi bi-github me-2"></i>
                Gestion Animaux
            </a>
        </li>
        <li class="nav-item">
            <a href="<?= $router->url('compte')?>" class="nav-link text-white <?= $activeGestion ?? "" ?>" aria-current="page">
                <i class="bi bi-people me-2"></i>
                gestion de comptes
            </a>
        </li>
    </ul>
    <hr>
    <div>
        <a href="#" class="d-flex align-items-center text-white text-decoration-none " >
            <i class="bi bi-person-bounding-box me-2"></i>
            <strong><?= $utilisateur->getRole()->getLabel() ?? "Role" ?></strong>
        </a>
    </div>
</div>