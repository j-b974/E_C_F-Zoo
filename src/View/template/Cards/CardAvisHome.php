<?php foreach($lstAvis as $avis) : ?>
    <div class="card m-3 col-sm-4 col-md-3" >
        <div class="card-header">
            <h5 class="card-title"><?= htmlspecialchars($avis->getPseudo()) ?></h5>
        </div>
        <div class="card-body">
            <p class="card-text"><?= htmlspecialchars( $avis->getCommentaire()) ?></p>
        </div>
    </div>
<?php endforeach; ?>