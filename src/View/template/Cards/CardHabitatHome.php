<?php foreach($lstHabitat as $habitat) : ?>
    <div class="card m-3 " style="max-width: 18rem;">
        <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'habitat'.DIRECTORY_SEPARATOR.$habitat->getImage() ?>" alt="<?= $habitat->getNom() ?>" style=" width: 100%;">
        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($habitat->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($habitat->getDescription()) ?></p>
        </div>
    </div>
<?php endforeach; ?>