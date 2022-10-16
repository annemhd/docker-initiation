<?php include('auth.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Accueil</title>
</head>

<body>

    <?php
    require('db.php');
    include('navigation.php');

    $sql = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
    ?>

        <h1><?php echo $data['title'] . '<br>'; ?></h1>
        <p><?php echo $data['firstname'] . ' ' . $data['lastname'] . ' le ' . $data['date']; ?></p>
        <img src="<?php echo $data['image']; ?>">
        <p style="white-space: pre-line;">
            <?php

            if (strlen($data['content']) >= 200) {
                echo substr($data['content'], 0, 200) . "...";
            } else {
                echo substr($data['content'], 0, 200);
            }

            if ($data['author'] == $_SESSION['username']) {
            ?>
        </p>

        <form method="POST" action="post_read.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="read" value="Lire">
        </form>

        <form method="POST" action="post_edit.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="edit" value="Editer">
        </form>

        <form method="POST" action="post_delete.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="delete" value="Supprimer">
        </form>
    <?php
            } else {
    ?>
        <form method="POST" action="post_read.php">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="read" value="Lire">
        </form>
    <?php


            }
    ?>
<?php
    }
?>

</body>

</html>