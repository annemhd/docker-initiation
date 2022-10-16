<?php include('auth.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blog - Tableau de bord</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php
    include('navigation.php');
    ?>

    <p>Hello, <?php echo $_SESSION['username']; ?> !</p>

    <?php
    require('db.php');

    $author = $_SESSION['username'];

    $sql = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author WHERE author = '$author'") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
        $_SESSION['id'] = $data['id'];
        echo $data['title'] . "<br>";
        echo $data['date'] . "<br>";
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
            echo '<br>';
        }
    }
    ?>

</body>

</html>