
<h3 class="text-center">ajouter un  utilisateur </h3>
<div class= "w-50 m-auto p-4 bg-dark text-white ">
    <form action="<?= $router->url('addCompte')?>" method="post">
        <?= $htmlForm->getInput('username','Username')?>
        <div class="d-flex justify-content-between">
            <?= $htmlForm->getInput('nom', 'Nom')?>
            <?= $htmlForm->getInput('prenom','Prenom') ?>
        </div>
        <?= $htmlForm->select('label','le role de l\'utilisateur' ,['veterinaire' ,' employer'])?>
        <?= $htmlForm->getInput('password','Password')?>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
            <button class="btn btn-outline-light me-md-2" name= "compte" type="submit">créer</button>
        </div>
    </form>
</div>
