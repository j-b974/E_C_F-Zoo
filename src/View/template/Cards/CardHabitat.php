<?php foreach($lstHabitat as $habitat) : ?>
    <div class="card w-75 m-auto mb-3">
        <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">

        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($habitat->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($habitat->getDescription()) ?></p>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="<?= $router->url('habitatZooSingle',['id'=> $habitat->getId()])?>" class="btn btn-primary">Visitez <?= htmlspecialchars($habitat->getNom())?></a>
        </div>
    </div>
<?php endforeach; ?>