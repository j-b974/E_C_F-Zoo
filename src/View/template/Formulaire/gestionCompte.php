<h3 class="text-center"><?= htmlentities($btnLabel)?> un  utilisateur </h3>
<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->getInput('username','Username')?>
        <div class="d-flex flex-column justify-content-md-between flex-md-row" >
            <?= $htmlForm->getInput('nom', 'Nom')?>

            <?= $htmlForm->getInput('prenom','Prenom') ?>
        </div>
        <?= $htmlForm->select('label','le role de l\'utilisateur' ,['veterinaire' ,'employer'])?>

        <?= $htmlForm->getInput('password','Password')?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
