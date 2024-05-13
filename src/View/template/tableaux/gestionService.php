<div class="table-responsive">
<table class="table table-striped table-bordered table-hover table-responsive-sm text-dark">
    <thead class="thead-light fontRoboto">
    <tr>
        <th scope="col">#</th>
        <th scope="col">nom</th>
        <th scope="col">description</th>
        <th scop="col">image</th>
        <th colspan="2" scope="col" class="text-center">gestion</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allService as $Service) : ?>
        <tr>
            <th scope="row"><?= htmlentities($Service->getId())?></th>

            <td><?=  htmlentities($Service->getNom())?></td>
            <td><?=  htmlentities($Service->getDescription())?></td>
            <td>
                <img src="<?= $_SERVER['HTTP_HOST_ZOO'].PATH_IMAGE.'services'.DIRECTORY_SEPARATOR.$Service->getImage() ?>" alt="<?= $Service->getNom() ?>"  style=" max-width: 8rem;">
            </td>
            <td class="text-center">
                <form method='POST' action='<?= $router->url('serviceModifier',['id'=> $Service->getId()]) ?>'>
                    <button class="btn btn-warning btn-sm " type="submit">Modifier </button>
                </form>
            </td>
            <?php if($utilisateur->getRole()->getLabel()=='administrateur') : ?>
                <td class="text-center">
                    <form method='POST' action='<?= $router->url('serviceSupprimer',['id'=>$Service->getId()]) ?>'>
                        <button class="btn btn-danger btn-sm text-white" type="submit">Supprimer </button>
                    </form>
                </td>
            <?php endif ; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</div>