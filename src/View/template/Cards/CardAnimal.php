<div id="carouselExampleFade" class="carousel slide carousel-fade m-auto" style="max-width: 32rem">
    <div class="carousel-inner">
        <?php foreach($lstAnimal as $key => $animal) : ?>

        <div class="carousel-item <?= ($key == 0) ? 'active' : '' ?>">
            <a href="<?= $router->url('habitatAnimal',['id'=>$animal->getId()]) ?>">
                <img src="http://localhost:8888/asset/images/tigre.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption m-auto" style="max-width: 18rem;">
                    <h5 class="fontRoboto text-primary bg-light">Voir <?= htmlspecialchars($animal->getPrenom()) ?></h5>
                </div>
            </a>
        </div>
        <?php endforeach;  ?>
    </div>
    <button class="carousel-control-prev bg-black" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon " aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next bg-black" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
