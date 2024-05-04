<?php foreach($lstAnimal as $animal) : ?>
        <div class="card m-3" style="max-width: 18rem;">
            <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($animal->getPrenom()) ?></h5>
            </div>
        </div>
<?php endforeach; ?>