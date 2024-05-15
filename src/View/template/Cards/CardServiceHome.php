<?php foreach($lstService as $service) : ?>
    <div class="card m-3" style="max-width: 18rem;">
        <img class="card-img-top" src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'services'.DIRECTORY_SEPARATOR.$service->getImage() ?>" alt="<?= $service->getNom() ?>"  style=" width: 100%;">
        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($service->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($service->getDescription()) ?></p>
        </div>
    </div>
<?php endforeach; ?>