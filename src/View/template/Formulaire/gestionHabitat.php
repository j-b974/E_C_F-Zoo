<h3 class="text-center fontRoboto"><?= htmlentities($btnLabel)?> </h3>
<div class= "m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post" enctype="multipart/form-data">
        <?= $htmlForm->getInput('nom','nom de l\'habitat')?>

        <?= $htmlForm->getTextarea('description','la description')?>
        <?= $htmlForm->getTextarea('commentaireHabitat', 'le commentaire de l\'habitat ') ?>
        <div class="row">
            <div class="col-md-9">
                <div class="col-md-9">
                    <?= $htmlForm->getInputFile('image', 'Mettre un image d\'habitat') ?>
                </div>
            </div>
            <div class="col-md-3">
                <?php if($habitat->getImage()):?>
                    <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'habitat'.DIRECTORY_SEPARATOR.$habitat->getImage() ?>" alt="<?= $habitat->getNom() ?>" style="max-width:8rem;">
                <?php endif ; ?>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
