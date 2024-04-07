<table class="table table-striped table-bordered table-hover text-dark">
    <thead class="thead-light fontRoboto">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">nom</th>
        <th scope="col">prenom</th>
        <th scope="col">role</th>
        <th colspan="2" scope="col" class="text-center">gestion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($dataUtilisateur as $utilisateur) : ?>
    <tr>
        <th scope="row"><?= htmlentities($utilisateur->getId())?></th>
        <td ><?=  htmlentities($utilisateur->getUsername())?></td>
        <td><?=  htmlentities($utilisateur->getNom())?></td>
        <td><?=  htmlentities($utilisateur->getPrenom())?></td>
        <td><?=  htmlentities($utilisateur->getRole()->getLabel())?></td>
        <td class="text-center">
            <form method='POST' action='<?= $router->url('modifCompte',['id'=> $utilisateur->getId()]) ?>'>
                <button class="btn btn-warning " type="submit">Modifier </button>
            </form>
        </td>
        <td class="text-center">
            <form method='POST' action='<?= $router->url('suprimeCompte',['id'=>$utilisateur->getId()]) ?>'>
                <button class="btn btn-danger text-white" type="submit">Supprimer </button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
