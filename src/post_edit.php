<?php
include('auth.php');
require('db.php');

$id = $_SESSION['id'];
$author = $_SESSION['username'];

if (isset($_POST['update'])) {
    $erreur = NULL;

    extract($_POST);

    if ($erreur == null) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $sql = "UPDATE `posts` SET author='$author', title='$title', content='$content', date='$date' WHERE id = '$id' AND author='$author'";

        if ($con->query($sql) === TRUE) {
            header('location:dashboard.php');
        } else {
            echo 'Error: ' . $sql . '<br>' . $con->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $sql = mysqli_query($con, "SELECT * FROM posts  WHERE id = '$id'") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
        if ($data['author'] == $_SESSION['username']) {
    ?>
            <form method="POST" action="">
                <input type="hidden" name="author" value="<?php echo $_SESSION['username']; ?>">
                <input type="hidden" name="date" value="<?php echo $data['date']; ?>" />
                <input type="text" name="title" placeholder="Titre" value="<?php echo $data['title']; ?>">
                <textarea name="content" placeholder="Écrivez votre article ici">
                    <?php echo $data['content']; ?>
                </textarea>
                <input type="button" onclick="window.history.back()" value="Annuler" />
                <input type="submit" name="update" value="Valider les changements">
            </form>
    <?php
        }
    }
    ?>

</body>

</html>