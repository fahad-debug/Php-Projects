<?php
session_start();

require('php/model/model.php');

$db = connexion();
// CONNEXION
if (!empty($_POST['nom']) && !empty($_POST['pwd'])) {

    $nom = $_POST['nom'];
    $pwd = $_POST['pwd'];
    $req = $db->prepare('SELECT * FROM users WHERE nom = ? limit 1; ');
    $req->execute(array($nom));

    while ($user = $req->fetch()) {
        if (password_verify($pwd, $user['pwd'])) {
            header('location:skill.php?success=1');
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['id'] = $user['id_users'];
            exit();
        } else {
            echo "le nom ou le mot de pass est incorret";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Formulaire de connexion</title>
</head>

<body>
    <header>
        <h1>FORMULAIRE DE CONNEXION</h1>
    </header>
    <main class="container">
        <div class="row">
            <section class="col-12">   
                           <!-- il recupere success par l'url  -->
            <?php if(isset($_GET['success'])){
                echo "<p class='alert alert-success'>félicitations "  .$_SESSION['nom'] ." vous etes inscrits<p>";
            } ?>
                <form class="form connexion" method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Entrez votre mot de passe">
                    </div>
                    <div>
                        <button class="btn btn-primary">Connexion</button>
                        <a href="inscription.php">S'inscrire</a>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <footer>

    </footer>
</body>

</html>