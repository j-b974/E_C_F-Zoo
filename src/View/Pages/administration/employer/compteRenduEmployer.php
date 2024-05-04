<div class="ms-4 m-auto">
    <h1 class="text-center fontRoboto mb-5">vos compte rendus</h1>
    <div class=" mt-4 mb-4">
        <a class="btn btn-primary " href="<?= $router->url('compteRenduEmployeRediger') ?>">créer un compte rendu</a>
    </div>
    <div  class ="d-flex flex-wrap justify-content-lg-center justify-content-around">
        <?php require dirname(__DIR__,3).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'Cards'.DIRECTORY_SEPARATOR.'CardCompteRenduEmployer.php'; ?>
    </div>
</div>
