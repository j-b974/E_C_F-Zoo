<div class="card m-auto ">
    <img class="card-img-top" src="http://localhost:8888/asset/images/tigre.jpg" alt="Card image cap">

    <div class="card-body">
        <h5 class="card-title"> <?= htmlspecialchars($Habitat->getNom()) ?></h5>
        <p class="card-text"><?= htmlspecialchars($Habitat->getDescription()) ?></p>
        <p class="card-text"><?= htmlspecialchars($Habitat->getCommentaireHabitat()) ?></p>

    </div>
    <div class="card-footer ">
        <h5 class="card-title"> les animaux de cet habitat</h5>
        <div class=" m-auto m-3 bg-primary text-white" >
            <?php require __DIR__.DIRECTORY_SEPARATOR.'CardAnimal.php' ?>
        </div>
    </div>

</div>