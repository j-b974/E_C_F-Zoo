<?php foreach($allCompte as $CompteRendu) : ?>
    <div class=" m-3">
        <div class="card" style="min-width: 18rem;">
            <div class="card-body">
                <h5 class="card-title fontRoboto">animal : <?= htmlspecialchars( $CompteRendu->getAnimal()->getPrenom()) ?></h5>
                <div class="d-flex flex-column">
                    <h6 class="card-subtitle mb-2 text-muted">rapport n°<?= htmlspecialchars($CompteRendu->getId()) ?><h6 class="card-subtitle mb-2 text-muted">créé le <?= htmlspecialchars($CompteRendu->getDate()->format('d F Y')  ) ?></h6>
                </div>
                <p class="card-text">par  <?= htmlspecialchars( $CompteRendu->getEmployeId()->getNom().' '.$CompteRendu->getEmployeId()->getPrenom() ) ?></p>
                <hr>
                <p class="card-text">nouriture: <?= htmlspecialchars( $CompteRendu->getNouriture()) ?></p>
                <p class="card-text">grammage: <?= htmlspecialchars( $CompteRendu->getQuantite()) ?></p>
                <p class="card-text">heure: <?= htmlspecialchars( $CompteRendu->getHeure()->format('H:i')) ?></p>

                <hr>
                <h5 class="card-title fontRoboto"> nom d'habitat : <?= htmlspecialchars( $CompteRendu->getAnimal()->getHabitat()->getNom() ) ?></h5>
            </div>

        </div>
    </div>
<?php endforeach; ?>
