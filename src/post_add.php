<?php
include('auth.php');
require('db.php');

$error = NULL;

if (isset($_POST['insert'])) {

    extract($_POST);

    if ($error == null) {

        if (isset($_FILES['screenshot'])) {
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

            <script>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Blog - Ajouter un article</title>
</head>

<body>

    <?php include('navigation.php'); ?>

    <div class="text-center">
        <main class="w-50 m-auto" style="max-width: 400px;">
            <h1 class="h3 mb-3">Ajouter un article</h1>
            <form method="post" action="" enctype="multipart/form-data">

                <div class="form-floating mb-2">
                    <input type="text" name="title" class="form-control" id="floatingPassword" placeholder="Title">
                    <label for="floatingPassword">Titre</label>
                </div>
                <div class=" mb-2">
                    <textarea name="content" class="form-control" placeholder="Écrivez votre article ici"></textarea>
                </div>

                <input type="file" name="screenshot" class="w-100 btn btn-lg btn-link mb-2">

                <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />
                <input type="submit" value="Créer l'article" name="insert" class="w-100 btn btn-lg btn-primary mb-2" />
                <input type="button" onclick="window.history.back()" value="Annuler" class="w-100 btn btn-lg btn-secondary mb-2" />
            </form>
            <?php if ($error != NULL) {
            ?>
                <p class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </p>

            <?php
            }
            ?>
        </main>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>