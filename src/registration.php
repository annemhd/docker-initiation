<?php
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
require('db.php');

if (isset($_REQUEST['username'])) {

    $error = NULL;

    extract($_POST);

    if ($password != $password_confirmation) {
        $error = 'Les deux mots de passe sont différents';
    }
    if ($error == null) {
        $query    = "INSERT into `users` (username, password) VALUES ('$username', '" . md5($password) . "')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "Votre vompte a bien été crée, vous pouvez démormais vous connectez";
        } else {
            echo "Les informations données sont invalides, veuillez recommencer";
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
    <form class="form" action="" method="post">
        <input type="text" name="username" placeholder="Pseudonyme" required />
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe" />
        <input type="submit" name="submit" value="S'inscrire">
        <input type="button" onclick="location.href='login.php';" value="S'identifier" />
    </form>
</body>

</html>