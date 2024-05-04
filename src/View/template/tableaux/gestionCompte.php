<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover text-dark">
        <tbody>
        <?php foreach ($dataUtilisateur as $utilisateur) : ?>
            <tr>
                <td colspan="2">
                    <strong>#<?= htmlentities($utilisateur->getId()) ?></strong><br>
                    <strong>Username:</strong> <?= htmlentities($utilisateur->getUsername()) ?><br>
                    <strong>Nom:</strong> <?= htmlentities($utilisateur->getNom()) ?><br>
                    <strong>Prénom:</strong> <?= htmlentities($utilisateur->getPrenom()) ?><br>
                    <strong>Role:</strong> <?= htmlentities($utilisateur->getRole()->getLabel()) ?><br>
                </td>
            </tr>
            <tr>
                <td>
                    <form method='POST' action='<?= $router->url('modifCompte',['id'=> $utilisateur->getId()]) ?>'>
                        <button class="btn btn-warning btn-sm" type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <form method='POST' action='<?= $router->url('suprimeCompte',['id'=>$utilisateur->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
