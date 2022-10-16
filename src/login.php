<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}

require('db.php');

$error = null;

if (isset($_POST['username'])) {

    extract($_POST);

    if (empty($username) || empty($password)) {
        $error = 'Veuillez remplir tous les champs';
    }

    $sql = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'") or die('Erreur de la requête SQL');
    $row = mysqli_num_rows($sql);
    if ($row != 1) {
        $error = 'L\'identifiant est incorrect ou n\'existe pas';
    } else {
        $password = md5($password);
        $result = mysqli_fetch_array($sql);

        if ($result['password'] !== $password) {
            $error = 'Votre mot de passe est incorrect';
        } else {
            $_SESSION['username'] = $result['username'];
            $_SESSION['firstname'] = $result['firstname'];
            header('Location: dashboard.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Blog - Identification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

    <?php include('navigation.php'); ?>

    <div class="text-center">
        <main class="w-50 m-auto" style="max-width: 400px;">
            <form method="post" name="login">
                <h1 class="h3 mb-3">S'identifier</h1>

                <div class="form-floating mb-2">
                    <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur">
                    <label for="floatingInput">Nom d'utilisateur</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Mot de passe</label>
                </div>
                <input type="submit" value="S'identifier" name="submit" class="w-100 btn btn-lg btn-primary mb-2" />
            </form>
            <p>Nouveau ? <a href="registration.php">S'inscrire</a></p>
            <?php if ($error != NULL) {
            ?>
                <div class="alert alert-danger" role="alert">

                    <?php echo $error; ?>
                </div>

            <?php
            } ?>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>