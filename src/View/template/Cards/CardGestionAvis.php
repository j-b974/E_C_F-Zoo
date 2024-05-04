<?php if(!empty($lstAvisNonVisible)) : ?>
    <h3 class="fontRoboto mb-3">avis non traiter ...</h3>
    <div class="d-flex flex-wrap justify-content-center">
    <?php foreach($lstAvisNonVisible as $avis) : ?>
            <div class="card m-3  bg-warning" style="max-width: 18rem;">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title pt-3"><?= htmlspecialchars($avis->getPseudo()) ?></h5>
                    <form method='POST' action='<?= $router->url('gestionAvis',['id'=> $avis->getId()]) ?>'>
                        <button class="btn btn-outline-primary " type="submit">Publier </button>
                    </form>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars( $avis->getCommentaire()) ?></p>
                </div>
                <div class="card-footer  ">
                    <form method='POST' action='<?= $router->url('gestionAvisSupprimer',['id'=>$avis->getId()]) ?>'>
                        <button class="btn btn-danger text-white" type="submit">Supprimer </button>
                    </form>
                </div>
            </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if(!empty($lstAvisVisible)) : ?>
    <h3 class="fontRoboto mb-3">avis publier !!!</h3>
    <div class="d-flex flex-wrap justify-content-center">
    <?php foreach($lstAvisVisible as $avis) : ?>
            <div class="card m-3 " style="max-width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title"><?= htmlspecialchars($avis->getPseudo()) ?></h5>
                </div>
                <div class="card-body">
                    <p class="card-text"><?= htmlspecialchars( $avis->getCommentaire()) ?></p>
                </div>
                <div class="card-footer  ">
                    <form method='POST' action='<?= $router->url('gestionAvisSupprimer',['id'=>$avis->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer </button>
                    </form>
                </div>
            </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
