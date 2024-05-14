<?php foreach($lstAnimal as $animal) : ?>
        <div class="card m-3" style="max-width: 18rem;">
            <img class="card-img-top" src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$animal->getImage() ?>" alt="<?= $animal->getPrenom() ?>" style="max-width:100%;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($animal->getPrenom()) ?></h5>
            </div>
        </div>
<?php endforeach; ?>