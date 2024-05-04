<h1 class="text-center mb-5"><?= $Habitat->getNom() ?? "Habitat" ?></h1>
<div class=" m-auto" style="max-width: 52rem;">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardSingleHabitat.php';
    ?>
</div>
