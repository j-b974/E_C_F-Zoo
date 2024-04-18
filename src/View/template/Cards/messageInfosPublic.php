
<?php if(isset($_GET['contact'])) :?>
    <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
        <strong>Contact :</strong>
        votre message à bien était envoyer
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
<?php endif; ?>
<?php if(isset($infoMessage) && $infoMessage) :?>
    <div class="text-center alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Erreur :</strong>
        le message n'a pas pu etre envoyer !!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
<?php endif; ?>
