<?php
include('auth.php');
require('db.php');

if (isset($_POST['insert'])) {
    $erreur = NULL;

    extract($_POST);

    if (empty($title) || empty($content)) {
        $erreur = 'Veuillez remplir tous les champs';
    }

    if ($erreur == null) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($con, $title);
        $content = $_POST['content'];
        $content = mysqli_real_escape_string($con, $content);
        $date = $_POST['date'];
        $sql = "INSERT INTO `posts` (author, title, content, date) VALUES ('$author', '$title', '$content', '$date')";

        if ($con->query($sql) === TRUE) {
            header('location:dashboard.php');
        } else {
            echo 'Erreur: ' . $sql . '<br>' . $con->error;
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
    <title>Ajouter un article</title>
</head>

<body>

    <form method="POST" action="">
        <input type="hidden" name="author" value="<?php echo $_SESSION['username']; ?>">
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <input type="text" name="title" placeholder="Titre">
        <textarea name="content" placeholder="Écrivez votre article ici"></textarea>
        <input type="button" onclick="window.history.back()" value="Annuler" />
        <input type="submit" name="insert" value="Créer mon évènement">
    </form>

</body>

</html>