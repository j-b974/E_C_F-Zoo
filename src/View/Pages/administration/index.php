<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre ?? "Zoo" ?></title>
    <link rel="stylesheet" href="http://localhost:8888/asset/css/main.css" crossorigin="anonymous">
    <link rel="icon" href="http://localhost:8888/asset/images/icon.png">

<body class="position-relative">

<div class="container-fluid ">
    <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'navBar.php' ?>
    <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'Cards'.DIRECTORY_SEPARATOR.'messageInfos.php' ?>
    <div class="row ">
        <div class=" col-md-4 sidebar sidebarPrincipale">
            <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'sideBare.php' ?>
        </div>
       <div class=" col content">
        <?= $contenu ?>
       </div>
    </div>
</div>
<!-- Offcanvas -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-body">
        <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'sideBare.php' ?>
    </div>
</div>
<!-- Offcanvas trigger button (visible on small screens) -->
<button class="badge text-bg-primary d-md-none position-fixed " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" style="z-index:1; top:50vh">
    >>
</button>
<script src="http://localhost:8888/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
