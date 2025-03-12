<h3 class="text-center fontRoboto">contacter le zoo</h3>
<div class= " m-auto p-4 bg-dark text-white " style="max-width: 52rem;">
    <form action="<?= $link?>" method="post">
        <?= $htmlForm->getInput('addressEmail','votre adresse email')?>
        <?= $htmlForm->getInput('titre','votre titre du message')?>
        <?= $htmlForm->getTextarea('description','votre message pour le zoo')?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit">
                <?= $btnLabel ?>
            </button>
        </div>
    </form>
</div>