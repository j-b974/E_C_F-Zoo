<table class="table table-striped table-bordered table-hover text-dark">
    <thead class="thead-light fontRoboto">
    <tr>
        <th scope="col">#</th>
        <th scope="col">nom</th>
        <th scope="col">description</th>
        <th scope="col">commentaire habitat</th>
        <th colspan="2" scope="col" class="text-center">gestion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allHabitat as $habitat) : ?>
        <tr>
            <th scope="row"><?= htmlentities($habitat->getId())?></th>
            <td><?=  htmlentities($habitat->getNom())?></td>
            <td><?=  htmlentities($habitat->getDescription())?></td>
            <td><?=  htmlentities($habitat->getCommentaireHabitat())?></td>
            <td class="text-center">
                <form method='POST' action='<?= $router->url('habitatModifier',['id'=> $habitat->getId()]) ?>'>
                    <button class="btn btn-warning " type="submit">Modifier </button>
                </form>
            </td>
            <td class="text-center">
                <form method='POST' action='<?= $router->url('habitatSupprimer',['id'=>$habitat->getId()]) ?>'>
                    <button class="btn btn-danger text-white" type="submit">Supprimer </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
