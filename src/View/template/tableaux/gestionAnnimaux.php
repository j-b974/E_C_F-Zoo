<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover text-dark">
        <tbody>
        <?php foreach ($allAnnimaux as $animal) : ?>
            <tr>
                <td colspan="2">
                    <div class="row">
                        <div class="col-md-9">
                            <strong>#<?= htmlentities($animal->getId()) ?></strong><br>
                            <strong>Prénom:</strong> <?= htmlentities($animal->getPrenom()) ?><br>
                            <strong>État:</strong> <?= htmlentities($animal->getEtat()) ?><br>
                            <strong>Race:</strong> <?= htmlentities($animal->getRace()->getLabel()) ?><br>
                            <strong>Habitat:</strong> <?= htmlentities($animal->getHabitat()->getNom()) ?><br>
                        </div>
                        <div class="col-md-3">
                            <?php if($animal->getImage()):?>
                                <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'animaux'.DIRECTORY_SEPARATOR.$animal->getImage() ?>" alt="<?= $animal->getPrenom() ?>" style="max-width:8rem;">
                            <?php endif ; ?>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <form method='POST' action='<?= $router->url('annimauxModifier',['id'=> $animal->getId()]) ?>'>
                        <button class="btn btn-warning btn-sm" type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <form method='POST' action='<?= $router->url('animauxSupprimer',['id'=>$animal->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
