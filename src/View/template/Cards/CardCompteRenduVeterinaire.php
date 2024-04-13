<?php foreach($allCompte as $CompteRendu) : ?>
    <div class=" col-lg-3 m-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fontRoboto"><?= $CompteRendu->getAnimal()->getPrenom() ?></h5>
                <div class="d-flex justify-content-between">
                    <h6 class="card-subtitle mb-2 text-muted">créé le <?= $CompteRendu->getDate()->format('d F Y')?></h6>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $CompteRendu->getEtat() ?></h6>
                </div>
                <p class="card-text"><?= $CompteRendu->getDetailEtat() ?></p>
                <h5 class="card-title fontRoboto"> nom d'habitat : <?= $CompteRendu->getAnimal()->getHabitat()->getNom() ?></h5>
                <a href="<?= $router->url('comptRenduVetoSingle',['id'=> $CompteRendu->getId()]) ?>" class="btn btn-primary ms-auto">Voir +</a>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <form method='POST' action='<?= $router->url('modifierCompteRenduVeto',['id'=> $CompteRendu->getId()]) ?>'>
                    <button class="btn btn-warning " type="submit">Modifier </button>
                </form>
                <form method='POST' action='<?= $router->url('supprimerCompteRenduVeto',['id'=>$CompteRendu->getId()]) ?>'>
                    <button class="btn btn-danger text-white" type="submit">Supprimer </button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
