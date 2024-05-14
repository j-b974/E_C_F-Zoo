<?php foreach($lstHabitat as $habitat) : ?>
    <div class="card w-75 m-auto mb-3">
        <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'habitat'.DIRECTORY_SEPARATOR.$habitat->getImage() ?>" alt="<?= $habitat->getNom() ?>" style=" width: 100%;">
        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($habitat->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($habitat->getDescription()) ?></p>
        </div>
        <div class="card-footer d-flex justify-content-end">
            <a href="<?= $router->url('habitatZooSingle',['id'=> $habitat->getId()])?>" class="btn btn-primary">Visitez <?= htmlspecialchars($habitat->getNom())?></a>
        </div>
    </div>
<?php endforeach; ?>