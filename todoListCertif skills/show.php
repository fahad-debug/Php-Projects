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
        <h1>Tableau des utilisateurs avec leurs compétences</h1>
        <nav>
            <a href="inscription.php">Inscription</a>
            <a href="connection.php">Connexion</a>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">1. Maquetter une application</th>
                            <th scope="col">2. Réaliser une interface utilisateur web statique et adaptable</th>
                            <th scope="col">3. Développer une interface utilisateur web dynamique</th>
                            <th scope="col">4.Créer une base de données</th>
                            <th scope="col">5.Développer les composants d’accès aux données</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require("php/model/model.php");

                        $bdd = connexion();

                        $sql = "SELECT * FROM `skills` ORDER BY `nom`";

                        $pdo = $bdd->prepare($sql);

                        $pdo->execute();

                        $resultats = $pdo->fetchAll();

                        foreach ($resultats as $resultat) {
                            extract($resultat);
                            echo "
                                <tr class='$'>
                                    <br><td>$nom</td>
                                    <td>$skill01</td>
                                    <td>$skill02</td>
                                    <td>$skill03</td>
                                    <td>$skill04</td>
                                    <td>$skill05</td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </main>
</body>

</html>