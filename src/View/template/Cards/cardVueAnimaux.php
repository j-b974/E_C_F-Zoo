<?php foreach($lstAnimaux as $animal) : ?>
    <div>
        <div class="card m-3 text-decoration-none " style="width: 18rem;" >
            <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($animal->getPrenom()) ?></h5>
                <p> nombre de vues : <?= $animal->getVue() ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>