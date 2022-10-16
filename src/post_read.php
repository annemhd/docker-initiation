<?php
include('auth.php');
require('db.php');

if (isset($_POST['read'])) {
    extract($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>