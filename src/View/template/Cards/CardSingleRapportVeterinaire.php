<div class="d-flex justify-content-center m-3">
    <div class="card" >
        <img class="card-img-top" src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$CompteRendu->getAnimal()->getImage() ?>" alt="<?= $CompteRendu->getAnimal()->getPrenom() ?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title fontRoboto"><?= htmlspecialchars( $CompteRendu->getAnimal()->getPrenom()) ?></h5>
            <div class="d-flex justify-content-between">
                <h6 class="card-subtitle mb-2 text-muted">créé le <?= htmlspecialchars($CompteRendu->getDate()->format('d F Y'))?></h6>
                <h6 class="card-subtitle mb-2 text-muted">état : <?= htmlspecialchars( $CompteRendu->getEtat() )?></h6>
            </div>
            <h6 class="card-subtitle mb-2 ">race : <?= htmlspecialchars( $CompteRendu->getAnimal()->getRace()->getLabel() )?></h6>
            <hr>
            <p class="card-text">nouriture recommander : <?= htmlspecialchars( $CompteRendu->getNouriture()) ?></p>
            <p class="card-text">quantiter recommander : <?= htmlspecialchars( $CompteRendu->getQuantite()) ?></p>

            <p class="card-text"><?= htmlspecialchars( $CompteRendu->getDetailEtat()) ?></p>
            <hr>
            <h5 class="card-title fontRoboto"> nom d'habitat : <?= htmlspecialchars( $CompteRendu->getAnimal()->getHabitat()->getNom() ) ?></h5>
            <p class="card-text">description :<?= htmlspecialchars( $CompteRendu->getAnimal()->getHabitat()->getDescription()) ?></p>
            <p class="card-text">commentaire de l'habitat : <?= htmlspecialchars( $CompteRendu->getAnimal()->getHabitat()->getCommentaireHabitat()) ?></p>

        </div>

    </div>
</div>