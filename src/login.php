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
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <?php include('navigation.php'); ?>

    <form class="form" method="post" name="login">
        <input type="text" name="username" placeholder="Nom d'utilisateur" />
        <input type="password" name="password" placeholder="Mot de passe" />
        <input type="submit" value="S'identifier" name="submit" />
    </form>
    <?php echo $error; ?>
</body>

</html>