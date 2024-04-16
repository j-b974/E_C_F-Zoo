<?php foreach($allCompte as $CompteRendu) : ?>
    <div class=" col-lg-3 m-3">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title fontRoboto"><?= htmlspecialchars( $CompteRendu->getAnimal()->getPrenom()) ?></h5>
                <div class="d-flex flex-column">
                    <h6 class="card-subtitle mb-2 text-muted">rapport n°<?= htmlspecialchars($CompteRendu->getId()) ?>
                    <h6 class="card-subtitle mb-2 text-muted">créé le <?= htmlspecialchars($CompteRendu->getDate()->format('d F Y')  ) ?></h6>

                </div>
                <hr>
                <p class="card-text">nouriture: <?= htmlspecialchars( $CompteRendu->getNouriture()) ?></p>
                <p class="card-text">grammage: <?= htmlspecialchars( $CompteRendu->getQuantite()) ?></p>
                <p class="card-text">heure: <?= htmlspecialchars( $CompteRendu->getHeure()->format('H:i')) ?></p>

               <hr>
                <h5 class="card-title fontRoboto"> nom d'habitat : <?= htmlspecialchars( $CompteRendu->getAnimal()->getHabitat()->getNom() ) ?></h5>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <form method='POST' action='<?= $router->url('compteRenduEmployeModifier',['id'=> $CompteRendu->getId()]) ?>'>
                    <button class="btn btn-warning " type="submit">Modifier </button>
                </form>
                <form method='POST' action='<?= $router->url('compteRenduEmployeSupprimer',['id'=>$CompteRendu->getId()]) ?>'>
                    <button class="btn btn-danger text-white" type="submit">Supprimer </button>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
