<h3 class="text-center"><?= htmlentities($btnLabel)?> le compte rendu</h3>
<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;" >
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->selectFloating('animal','la race de l\'animal',$lstAnimal, $animalSelect ) ?>

        <?= $htmlForm->getInput('nouriture','la nouriture distribuer',)?>

        <?= $htmlForm->getInput('quantite','le grammage de la nouriture')?>

        <?= $htmlForm->getInputDate('date','date du rapport')?>

        <?= $htmlForm->getInputTime('heure','Heure du nourissage')?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
