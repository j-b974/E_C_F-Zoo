<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover text-dark">
        <tbody>
        <?php foreach ($allHabitat as $habitat) : ?>
            <tr>
                <td>
                    <strong>#<?= htmlentities($habitat->getId()) ?></strong><br>
                    <strong>Nom:</strong> <?= htmlentities($habitat->getNom()) ?><br>
                    <strong>Description:</strong> <?= htmlentities($habitat->getDescription()) ?><br>
                    <strong>Commentaire habitat:</strong> <?= htmlentities($habitat->getCommentaireHabitat()) ?><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form method='POST' action='<?= $router->url('habitatModifier',['id'=> $habitat->getId()]) ?>'>
                        <button class="btn btn-warning btn-sm mb-3" type="submit">Modifier</button>
                    </form>
                    <form method='POST' action='<?= $router->url('habitatSupprimer',['id'=>$habitat->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
