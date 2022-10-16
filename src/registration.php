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
            $error = "Votre vompte a bien été crée, vous pouvez démormais vous connectez";
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
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php include('navigation.php'); ?>

    <?php if (!isset($_POST['submit'])) {
    ?>
        <form class="form" action="" method="post">
            <input type="text" name="username" placeholder="Pseudonyme" required />
            <input type="text" name="firstname" placeholder="Prénom" required />
            <input type="text" name="lastname" placeholder="Nom" required />
            <input type="password" name="password" placeholder="Mot de passe">
            <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" />
            <input type="submit" name="submit" value="S'inscrire">
        </form>
    <?php
    } else {
        echo $error;
    ?>
        <input type="button" onclick="location.href='login.php';" value="S'identifier" />
    <?php
    } ?>
</body>

</html>