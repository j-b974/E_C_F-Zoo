<h3 class="text-center">  <?= htmlentities($btnLabel)?> le service </h3>
<div class= "w-50 m-auto p-4 bg-dark text-white ">
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->getInput('nom','nom du service')?>

        <?= $htmlForm->getTextarea('description','la description')?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit"><?= $btnLabel ?></button>
        </div>
    </form>
</div>
