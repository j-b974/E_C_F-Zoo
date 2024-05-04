<?php foreach($lstService as $service) : ?>
    <div class="card m-3" style="max-width: 18rem;">
        <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($service->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($service->getDescription()) ?></p>
        </div>
    </div>
<?php endforeach; ?>