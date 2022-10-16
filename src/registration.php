<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
require('db.php');
$error = NULL;
if (isset($_REQUEST['username'])) {

    extract($_POST);

    if (empty($username) || empty($firstname) || empty($lastname) || empty($password) || empty($password_confirmation)) {
        $error = 'Veuillez remplir tous les champs';
    }

    if ($password != $password_confirmation) {
        $error = 'Les deux mots de passe sont différents';
    }

    if ($error == null) {
        $lastname = strtoupper($lastname);
        $query    = "INSERT into `users` (username, firstname, lastname, password) VALUES ('$username', '$firstname' , '$lastname','" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            $error = NULL;
        } else {
            $error = "Les informations données sont invalides, veuillez recommencer";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blog - Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php include('navigation.php'); ?>

    <div class="text-center">
        <main class="w-50 m-auto" style="max-width: 400px;">
            <form method="post" action="">
                <h1 class="h3 mb-3">S'inscrire</h1>

                <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur">
                    <label for="floatingInput">Nom d'utilisateur</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="firstname" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Prénom</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" name="lastname" class="form-control" id="floatingPassword" placeholder="Confirmation du mot de passe">
                    <label for="floatingPassword">Nom</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Mot de passe</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password_confirmation" class="form-control" id="floatingPassword" placeholder="Confirmer le mot de passe">
                    <label for="floatingPassword">Confirmer le mot de passe</label>
                </div>
                <input type="submit" value="S'identifier" name="submit" class="w-100 btn btn-lg btn-primary mb-2" />
            </form>
            <p>Déjà un compte ? <a href="login.php">S'identifier</a></p>
            <?php if ($error != NULL) {
            ?>
                <p class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </p>

            <?php
            } else {
            ?>
                <p class="alert alert-info">Votre vompte a bien été crée, vous pouvez démormais vous connectez <a href="login.php">ici</a></p>
            <?php } ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>