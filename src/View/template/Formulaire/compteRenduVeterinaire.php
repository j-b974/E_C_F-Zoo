<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post">

        <?= $htmlForm->selectFloating('animal','l\'animal',$lstAnimal, $animalSelect ) ?>

        <?= $htmlForm->getInput('nouriture','la nouriture recommander',)?>

        <?= $htmlForm->getInput('quantite','le grammage de la nouriture')?>

        <?= $htmlForm->getInput('etat','état santé de l\'aniaml ')?>

        <?= $htmlForm->getTextarea('detailEtat','les détail sur l\'état de santé ')?>

        <?= $htmlForm->getInputDate('date','date du rapport')?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
