<div class="ms-4 ">
    <h1 class="text-center fontRoboto">gestion de service</h1>
    <div class=" mt-4 mb-4">
        <a class="btn btn-primary " href="<?= $router->url('serviceRajouter') ?>">créer un service de zoo</a>
    </div>
    <?php require dirname(__DIR__ , 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'tableaux'.DIRECTORY_SEPARATOR.'gestionService.php'; ?>
</div>