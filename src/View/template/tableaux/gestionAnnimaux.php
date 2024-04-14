<table class="table table-striped table-bordered table-hover text-dark">
    <thead class="thead-light fontRoboto">
    <tr>
        <th scope="col">#</th>
        <th scope="col">prenom</th>
        <th scope="col">etat</th>
        <th scope="col">race</th>
        <th scope="col">habitat</th>
        <th colspan="2" scope="col" class="text-center">gestion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allAnnimaux as $annimal) : ?>
        <tr>
            <th scope="row"><?= htmlentities($annimal->getId())?></th>
            <td><?=  htmlentities($annimal->getPrenom())?></td>
            <td><?=  htmlentities($annimal->getEtat())?></td>
            <td><?=  htmlentities($annimal->getRace()->getLabel())?></td>
            <td><?=  htmlentities($annimal->getHabitat()->getNom())?></td>
            <td class="text-center">
                <form method='POST' action='<?= $router->url('annimauxModifier',['id'=> $annimal->getId()]) ?>'>
                    <button class="btn btn-warning " type="submit">Modifier </button>
                </form>
            </td>
            <td class="text-center">
                <form method='POST' action='<?= $router->url('annimauxSupprimer',['id'=>$annimal->getId()]) ?>'>
                    <button class="btn btn-danger text-white" type="submit">Supprimer </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
