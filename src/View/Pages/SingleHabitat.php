<h1 class="text-center"><?= $Habitat->getNom() ?? "Habitat" ?></h1>
<div class="w-75 m-auto">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardSingleHabitat.php';
    ?>
</div>
