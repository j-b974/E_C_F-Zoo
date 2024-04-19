<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre ?? "Zoo" ?></title>
    <link rel="stylesheet" href="http://localhost:8888/asset/css/main.css" crossorigin="anonymous">
   <link rel="icon" href="http://localhost:8888/asset/images/icon.png">

<body>
    <div class="container-fluid">
        <?php require 'template'.DIRECTORY_SEPARATOR.'navBar.php' ?>
        <?php require 'template'.DIRECTORY_SEPARATOR.'Cards'.DIRECTORY_SEPARATOR.'messageInfosPublic.php' ?>
        <?= $contenu ?>
    </div>

    <script src="http://localhost:8888/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>