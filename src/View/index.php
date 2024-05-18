<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $titre ?? "Zoo" ?></title>
    <link rel="stylesheet" href="<?=$_SERVER['HTTP_HOST_ZOO']?>asset/css/main.css" crossorigin="anonymous">
   <link rel="icon" href="<?=$_SERVER['HTTP_HOST_ZOO']?>asset/images/icon.png">

<body>
    <div class="container-fluid">
        <?php require 'template'.DIRECTORY_SEPARATOR.'navBar.php' ?>
        <?php require 'template'.DIRECTORY_SEPARATOR.'Cards'.DIRECTORY_SEPARATOR.'messageInfosPublic.php' ?>
        <?= $contenu ?>
        <?php require 'template'.DIRECTORY_SEPARATOR.'footer.php' ?>
    </div>

    <script src="<?=$_SERVER['HTTP_HOST_ZOO']?>node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=$_SERVER['HTTP_HOST_ZOO']?>asset/js/main.js"></script>

</body>
</html>