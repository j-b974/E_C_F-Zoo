<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark fontRoboto card-sidBare " style="min-width: 17rem;">
    <div class="d-flex align-items-center justify-content-between mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Sidebar</span>
        <button type="button" class="btn-close text-reset d-md-none bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto ">
        <?php if($utilisateur->getRole()->getLabel()=='employer' || $utilisateur->getRole()->getLabel()=='administrateur') : ?>
        <li class="nav-item">
            <a href="<?= $router->url('gestionAvis',['id'=> 0])?>" class="nav-link text-white <?= $activeAvisVisiteur ?? "" ?>" >
                <i class="bi bi-calendar2-minus me-2"></i>
                Avis Visiteurs
            </a>
        </li>
            <li class="nav-item">
                <a href="<?= $router->url('service')?>" class="nav-link text-white <?= $activeGestionService ?? "" ?>" aria-current="page">
                    <i class="bi bi-basket3 me-2"></i>
                    gestion de services
                </a>
            </li>
        <?php endif; ?>
        <?php if($utilisateur->getRole()->getLabel()=='employer') : ?>
            <?php require __DIR__.DIRECTORY_SEPARATOR.'Partials'.DIRECTORY_SEPARATOR.'liEmployer.php' ?>
        <?php endif; ?>

        <?php if($utilisateur->getRole()->getLabel()=='veterinaire') : ?>
            <?php require __DIR__.DIRECTORY_SEPARATOR.'Partials'.DIRECTORY_SEPARATOR.'liVeterinaire.php' ?>
        <?php endif; ?>

        <?php if($utilisateur->getRole()->getLabel()=='administrateur') : ?>
            <?php require __DIR__.DIRECTORY_SEPARATOR.'Partials'.DIRECTORY_SEPARATOR.'liAdmin.php' ?>
        <?php endif; ?>
    </ul>
    <hr>
    <div>
        <a href="#" class="d-flex align-items-center text-white text-decoration-none " >
            <i class="bi bi-person-bounding-box me-2"></i>
            <strong><?= $utilisateur->getRole()->getLabel() ?? "Role" ?></strong>
        </a>
    </div>
</div>
