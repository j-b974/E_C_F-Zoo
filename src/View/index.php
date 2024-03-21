<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre ?? "Zoo" ?></title>
    <link rel="stylesheet" href="./asset/css/main.css" crossorigin="anonymous">

<body>
    <div class="container-fluid">
        <?php require 'template'.DIRECTORY_SEPARATOR.'navBar.php' ?>
        <?= $contenu ?>
    </div>


    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>