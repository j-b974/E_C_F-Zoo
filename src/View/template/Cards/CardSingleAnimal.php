<div class="card w-75 m-auto mb-3">
    <img class="card-img-top" src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$animal->getImage() ?>" alt="<?= $animal->getPrenom() ?>" style="max-width:100%;">

    <div class="card-body">
        <h5 class="card-title"> <?= htmlspecialchars($animal->getPrenom()) ?></h5>
        <p class="card-text">race : <?= htmlspecialchars($animal->getRace()->getLabel()) ?></p>
        <p class="card-text">etat: <?= htmlspecialchars($animal->getEtat())?></p>
    </div>
    <div class="card-footer ">
        <h5 class="card-title"> habitat <?=  htmlspecialchars($animal->getHabitat()->getNom())?></h5>
        <p class="card-text">description : <?= htmlspecialchars($animal->getHabitat()->getDescription())?></p>
        <p class="card-text "><?= htmlspecialchars($animal->getHabitat()->getCommentaireHabitat()) ?></p>
    </div>
</div>