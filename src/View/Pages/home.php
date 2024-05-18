<div class="bannier" style="background-image: url('<?=$_SERVER['HTTP_HOST_ZOO']?>asset/images/tigre.jpg');">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardBanierHome.php'; ?>
</div>
<h3 class="text-center fontRoboto m-5 ">nous proposons plusieurs service pour nos visiteurs</h3>
<div class="d-flex flex-wrap justify-content-around">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardServiceHome.php'; ?>
</div>

<h3 class="text-center fontRoboto m-5 ">zoo  dispose des plusieurs habitat pour les animaux</h3>

<div class="d-flex flex-wrap justify-content-around">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardHabitatHome.php'; ?>
</div>
<h3 class="text-center fontRoboto m-5 ">des centaines d'animaux</h3>
<div class="d-flex justify-content-around flex-wrap ">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardAnimalHome.php'; ?>
</div>
<?php if(isset($lstAvis) && !empty($lstAvis)) : ?>
<h3 class="text-center fontRoboto m-5 ">ils donnent leur avis </h3>
<div class=" row flex-wrap justify-content-center m-3">
    <?php require dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'Cards' . DIRECTORY_SEPARATOR . 'CardAvisHome.php'; ?>
</div>
<?php endif ; ?>