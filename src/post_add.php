<?php
include('auth.php');
require('db.php');

$error = NULL;

if (isset($_POST['insert'])) {

    extract($_POST);

    if ($error == null) {

        if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == 0) {
            if ($_FILES['screenshot']['size'] <= 2000000) {
                $fileInfo = pathinfo($_FILES['screenshot']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png', 'svg', 'JPG', 'JPEG', 'GIF', 'PNG', 'SVG'];
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['screenshot']['tmp_name'], 'uploads/' . basename($_FILES['screenshot']['name']));
                    $error = "L'envoi a bien été effectué !";
                    $image = 'uploads/' . basename($_FILES['screenshot']['name']);
                }
            }
        } else {
            $error = " Une erreur s'est produite pendant le téléchargement de l'image";
        }

        $author = $_SESSION['username'];
        $title = $_POST['title'];
        $title = mysqli_real_escape_string($con, $title);
        $content = $_POST['content'];
        $content = mysqli_real_escape_string($con, $content);
        $date = $_POST['date'];
        $sql = "INSERT INTO `posts` (author, title, content, date, image) VALUES ('$author', '$title', '$content', '$date', '$image')";

        if ($con->query($sql) === TRUE) {
?>

            <script LANGUAGE="JavaScript">
                document.location.href = "dashboard.php"
            </script>

<?php
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

    <?php include('navigation.php'); ?>

    <form method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="screenshot" />
        <input type="text" name="title" placeholder="Titre">
        <textarea name="content" placeholder="Écrivez votre article ici"></textarea>
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
        <input type="button" onclick="window.history.back()" value="Annuler" />
        <input type="submit" name="insert" value="Créer mon évènement">
    </form>
    <?php echo $error; ?>
</body>

</html>