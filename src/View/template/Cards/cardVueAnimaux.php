<?php foreach($lstAnimaux as $animal) : ?>
    <div>
        <div class="card m-3 text-decoration-none " style="width: 18rem;" >
            <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$animal->getImage() ?>" alt="<?= $animal->getPrenom() ?>" style="max-width:100%;">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($animal->getPrenom()) ?></h5>
                <p> nombre de vues : <?= $animal->getVue() ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>