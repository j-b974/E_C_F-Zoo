<?php foreach($lstService as $service) : ?>
    <div class="card w-25 m-auto mb-3">
        <img class="rounded float-left" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"> <?= htmlspecialchars($service->getNom()) ?></h5>
            <p class="card-text"><?= htmlspecialchars($service->getDescription()) ?></p>
        </div>
    </div>
<?php endforeach; ?>