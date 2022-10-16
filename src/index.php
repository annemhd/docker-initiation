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

    $sql = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
    ?>
        <img src="<?php echo $data['image']; ?>">
        <?php
        echo $data['id'] . '<br>';
        echo $data['title'] . '<br>';
        echo 'auteur ' . $data['author'] . '<br>';
        echo $data['date'] . '<br>';
        echo $data['content'] . '<br>';
        echo 'username ' . $_SESSION['username'] . '<br>';
        echo '<br>';
        if ($data['author'] == $_SESSION['username']) {
        ?>
            <form method="POST" action="post_edit.php">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="submit" name="edit" value="Editer">
            </form>

            <form method="POST" action="post_delete.php">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <input type="submit" name="delete" value="Supprimer">
            </form>

    <?php
        }
    }
    ?>

</body>

</html>