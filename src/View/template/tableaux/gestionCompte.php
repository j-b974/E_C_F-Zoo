<table class="table table-striped table-bordered table-hover text-dark">
    <thead class="thead-light fontRoboto">
    <tr>
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
        <th scope="row"><?= $utilisateur->getUsername()?></th>
        <td><?= $utilisateur->getNom()?></td>
        <td><?= $utilisateur->getPrenom()?></td>
        <td><?= $utilisateur->getRole()->getLabel()?></td>
        <td><a class="btn btn-warning" href="#">Modifier</a></td>
        <td><a class="btn btn-danger text-white" href="#">Suprimer</a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
