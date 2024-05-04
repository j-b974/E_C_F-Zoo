<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover text-dark">
        <tbody>
        <?php foreach ($allAnnimaux as $annimal) : ?>
            <tr>
                <td colspan="2">
                    <strong>#<?= htmlentities($annimal->getId()) ?></strong><br>
                    <strong>Prénom:</strong> <?= htmlentities($annimal->getPrenom()) ?><br>
                    <strong>État:</strong> <?= htmlentities($annimal->getEtat()) ?><br>
                    <strong>Race:</strong> <?= htmlentities($annimal->getRace()->getLabel()) ?><br>
                    <strong>Habitat:</strong> <?= htmlentities($annimal->getHabitat()->getNom()) ?><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form method='POST' action='<?= $router->url('annimauxModifier',['id'=> $annimal->getId()]) ?>'>
                        <button class="btn btn-warning btn-sm" type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <form method='POST' action='<?= $router->url('annimauxSupprimer',['id'=>$annimal->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
