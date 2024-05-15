<h3 class="text-center fontRoboto"><?= htmlentities($btnLabel)?> un animal </h3>
<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post" enctype="multipart/form-data">
        <?= $htmlForm->getInput('prenom','le prenom de l\'animale',)?>

        <?= $htmlForm->getTextarea('etat','état santé de l\'aniamle ')?>

        <?= $htmlForm->selectFloating('label','la race de l\'animale', $lstRace, $animaux->getRace()?->getId() ) ?>
        <?= $htmlForm->selectFloating('nom','liste des habitat', $lsthabitat, $animaux->getHabitat()?->getId()) ?>

        <div class="row">
            <div class="col-md-9">
                <?= $htmlForm->getInputFile('image', 'Mettre un image d\'animaux ') ?>
            </div>
            <div class="col-md-3">
                <?php if($animaux->getImage()):?>
                    <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$animaux->getImage() ?>" alt="<?= $animaux->getPrenom() ?>" style="max-width:8rem;">
                <?php endif ; ?>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
