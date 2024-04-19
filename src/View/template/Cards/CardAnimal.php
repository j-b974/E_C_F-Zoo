<?php foreach($lstAnimal as $animal) : ?>
<div>
    <a class="card m-3 text-decoration-none " style="width: 18rem;" href="<?= $router->url('habitatAnimal',['id'=>$animal->getId()])?>">
        <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($animal->getPrenom()) ?></h5>
        </div>
    </a>
</div>
<?php endforeach; ?>
