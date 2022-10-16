<?php include('auth.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>

    <?php
    require('db.php');
    include('navigation.php');

    $sql = mysqli_query($con, "SELECT * FROM posts") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
        echo $data['id'] . '<br>';
        echo $data['title'] . '<br>';
        echo $data['author'] . '<br>';
        echo $data['date'] . '<br>';
        echo $data['content'] . '<br>';
        echo '<br>';
        if ($data['author'] == $_SESSION['username']) {
        }
    }
    ?>

</body>

</html>