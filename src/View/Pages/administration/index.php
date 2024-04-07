<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre ?? "Zoo" ?></title>
    <link rel="stylesheet" href="http://localhost:8888/asset/css/main.css" crossorigin="anonymous">
    <link rel="icon" href="http://localhost:8888/asset/images/icon.png">

<body >
<div class="container-fluid">
    <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'navBar.php' ?>
    <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'Cards'.DIRECTORY_SEPARATOR.'messageInfos.php' ?>
    <div class="d-flex">
        <?php require dirname(__DIR__, 2).DIRECTORY_SEPARATOR.'template'.DIRECTORY_SEPARATOR.'sideBare.php' ?>
       <div class="flex-grow-1">
        <?= $contenu ?>
       </div>
    </div>

</div>


<script src="http://localhost:8888/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
