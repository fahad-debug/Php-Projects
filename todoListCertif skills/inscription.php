<?php
session_start();

require("php/model/model.php");
$db = connexion();

if (!empty($_POST['nom']) && !empty($_POST['pwd'])) {

    // VARIABLE

    $nom = $_POST['nom'];
    $pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
    $_SESSION['nom'] = $_POST['nom'];

    // TEST SI NOM UTILISE
    // on renome la fonction count : numberNom
    $req = $db->prepare("SELECT count(*) as numberNom FROM users WHERE nom = ?");
    $req->execute(array($nom));
   //on crée un fonction numberNom
    while ($nom_verification = $req->fetch()) {
        if ($nom_verification['numberNom'] != 0) {
            header('location: inscription.php?error=1&nom=1');
            exit();
        }
    }


    // ENVOI DE LA REQUETE
    $req = $db->prepare("INSERT INTO users(nom, pwd) VALUES(?,?)");
    $req->execute(array($nom, $pwd));

    header('location: connection.php?success=1');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>FORMULAIRE D'INSCRIPTION</h1>
    </header>
    <main class="container">
        <div class="row">
            <section class="col-12">
                <?php require_once "php/controller/controller.php"; ?>
                <?php if (isset($_GET['nom'])) {
                    echo "<p class='alert alert-danger'>Ce nom est déjà utilisée.</p>";
                }
                ?>
                <form class="form inscription" method="post">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez votre nom">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mot de passe</label>
                        <input type="password" name="pwd" class="form-control" id="pwd" placeholder="Entrez votre mot de passe">
                    </div>
                    <div>
                        <input type="hidden" value="inscription" name="formulaire">
                        <button class="btn btn-primary">S'inscrire</button>
                        <a href="connection.php">Connexion</a>
                    </div>
                </form>
            </section>
        </div>

    </main>
    <footer>

    </footer>
</body>

</html>