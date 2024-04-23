<h3 class="text-center"><?= htmlentities($btnLabel)?> un  service </h3>
<div class= "w-50 m-auto p-4 bg-dark text-white ">
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->getInput('nom','nom de l\'habitat')?>

        <?= $htmlForm->getTextarea('description','la description')?>
        <?= $htmlForm->getTextarea('commentaireHabitat', 'le commentaire de l\'habitat ') ?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
