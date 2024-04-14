<h3 class="text-center">ajouter un  service </h3>
<div class= "w-50 m-auto p-4 bg-dark text-white ">
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->getInput('prenom','le prenom de l\'annimale',)?>

        <?= $htmlForm->getTextarea('etat','état santé de l\'anniamle ')?>

        <?= $htmlForm->selectFloating('label','la race de l\'annimale', $lstRace, $animaux->getRace()?->getId() ) ?>
        <?= $htmlForm->selectFloating('nom','liste des habitat', $lsthabitat, $animaux->getHabitat()?->getId()) ?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
