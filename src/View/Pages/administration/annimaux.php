<div class="ms-4 ">
    <h1 class="text-center fontRoboto mb-5">gestion des animaux</h1>
    <div class=" mt-4 mb-4">
        <a class="btn btn-primary " href="<?= $router->url('annimauxRajouter') ?>">Rajouter un animal</a>
    </div>
    <?php require dirname(__DIR__ , 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'tableaux'.DIRECTORY_SEPARATOR.'gestionAnnimaux.php'; ?>
</div>