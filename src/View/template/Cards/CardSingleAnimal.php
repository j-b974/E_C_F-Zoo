<div class="card w-50 m-auto mb-3">
    <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">

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