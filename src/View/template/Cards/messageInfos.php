<?php if(isset($_GET['infos'])) :?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Réussit :</strong>
        <?= $_GET['infos'] == "creer"?
            "l'utilisateur à bien était rajourter  !!!" :
            "l'utilisateur à bien était modifier !!!";
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>

<?php endif; ?>
<?php if(isset($_GET['supression'])) : ?>
    <div class="text-center alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Suppression :</strong>
        <?= htmlentities($_GET['supression']) ?> a définitivement était supprimé !!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
<?php endif; ?>

<?php if(isset($_GET['infosService'])): ?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Réussit :</strong>
        <?= $_GET['infosService'] == "creer"?
            "le service à bien était rajourter  !!!" :
            "le service à bien était modifier !!!";
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
<?php endif; ?>
