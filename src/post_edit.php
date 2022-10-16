<?php
include('auth.php');
require('db.php');

$id = $_SESSION['id'];

$author = $_SESSION['username'];
$error = NULL;

if (isset($_POST['update'])) {

    extract($_POST);

    $id = $_SESSION['id'];;

    if ($error == null) {
        $author = $_POST['author'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $content = mysqli_real_escape_string($con, $content);
        $date = $_POST['date'];
        $sql = "UPDATE `posts` SET author='$author', title='$title', content='$content', date='$date' WHERE id = '$id' AND author='$author'";
        if ($con->query($sql) === TRUE) {
            header('location: dashboard.php');
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Blog - Modifier un article</title>
</head>

<body>

    <?php
    $sql = mysqli_query($con, "SELECT * FROM posts  WHERE id = '$id'") or die('Erreur de la requête SQL');
    while ($data = mysqli_fetch_array($sql)) {
        if ($data['author'] == $_SESSION['username']) {
    ?>
            <div class="text-center">
                <main class="w-50 m-auto" style="max-width: 400px;">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h1 class="h3 mb-3">Ajouter un article</h1>

                        <div class="form-floating mb-2">
                            <input type="text" name="title" value="<?php echo $data['title']; ?>" class=" form-control" id="floatingPassword" placeholder="Title">
                            <label for="floatingPassword">Titre</label>
                        </div>
                        <div class="mb-2">
                            <textarea name="content" class="form-control" placeholder="Écrivez votre article ici">
                                <?php echo $data['content']; ?>
                            </textarea>
                        </div>
                        <input type="hidden" name="author" value="<?php echo $_SESSION['username']; ?>">
                        <input type="hidden" name="date" value="<?php echo $data['date']; ?>" />
                        <input type="submit" value="Valider les changements" name="update" class="w-100 btn btn-lg btn-primary mb-2" />
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


    <?php
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>