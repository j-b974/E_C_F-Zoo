<h3 class="text-center fontRoboto">  <?= htmlentities($btnLabel)?></h3>
<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post" enctype="multipart/form-data">
        <?= $htmlForm->getInput('nom','nom du service')?>

        <?= $htmlForm->getTextarea('description','la description')?>
        <div class="row">
            <div class="col-md-9">
                <?= $htmlForm->getInputFile('image', 'Mettre un image de service') ?>
            </div>
            <div class="col-md-3">
                <?php if($service->getImage()) :?>
                    <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'services'.DIRECTORY_SEPARATOR.$service->getImage() ?>" alt="<?= $service->getNom() ?>"  style=" width: 100%;">
                <?php endif ; ?>
            </div>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
