<?php
include('auth.php');
require('db.php');

$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $sql_title = mysqli_query($con, "SELECT * FROM posts WHERE id='$id'") or die('Erreur de la requête SQL');
        while ($data = mysqli_fetch_array($sql_title)) {
            echo 'Blog - ' . $data['title'];
        }
        ?>
    </title>
</head>

<body>

    <?php
    require('db.php');
    include('navigation.php');

    $sql = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author WHERE posts.id='$id'") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
    ?>

        <h1><?php echo $data['title'] . '<br>'; ?></h1>
        <p><?php echo $data['firstname'] . ' ' . $data['lastname'] . ' le ' . $data['date']; ?></p>
        <img src="<?php echo $data['image']; ?>">

        <?php
        echo '<p style="white-space: pre-line;">' . $data['content'] . '</p>';
        if ($data['author'] == $_SESSION['username']) {
        ?>
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
        }
    }
    ?>

</body>

</html>