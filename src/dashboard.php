<?php include('auth.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blog - Tableau de bord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="container">

    <?php
    include('navigation.php');
    require('db.php');
    $author = $_SESSION['username'];

    $sql_count = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author WHERE author = '$author'") or die('Erreur de la requête SQL');
    $row = mysqli_num_rows($sql_count);
    ?>

    <h3>Hello, <?php echo $_SESSION['firstname']; ?> !</h3>

    <?php
    if ($row == 0) {
    ?>
        <p>Pas d'articles</p>
    <?php
    }
    ?>

    <p><?php echo $row; ?> article(s)</p>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        $sql = mysqli_query($con, "SELECT * FROM users INNER JOIN posts ON users.username=posts.author WHERE author = '$author'") or die('Erreur de la requête SQL');
        while ($data = mysqli_fetch_array($sql)) {
        ?>

            <div class="col">
                <div class="card h-100">
                    <div style="width:100%;height:350px;overflow:hidden;">
                        <img src="<?php echo $data['image']; ?>" class="card-img-top img-fluid" alt="...">
                    </div>
                    <div class="card-body d-flex flex-column p-5">
                        <h5 class="card-title"><?php echo $data['title']; ?></h5>
                        <p class="card-text">
                            <?php
                            if (strlen($data['content']) >= 200) {
                                echo substr($data['content'], 0, 200) . "...";
                            } else {
                                echo substr($data['content'], 0, 200);
                            }
                            ?>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-baseline">
                        <small class="text-muted m-0">Crée le <?php echo $data['date']; ?></small>
                        <?php if ($data['author'] == $_SESSION['username']) {
                        ?>
                            <div class="d-flex gap-2 align-items-end  justify-content-end">
                                <form method="POST" action="post_edit.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <input type="submit" name="edit" value="Editer" class="btn btn-lg btn-primary btn-sm">
                                </form>

                                <form method="POST" action="post_delete.php" class="d-inline">
                                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                    <input type="submit" name="delete" value="Supprimer" class="btn btn-lg btn-danger btn-sm">
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>