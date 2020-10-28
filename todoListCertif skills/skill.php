<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Skills Management</title>
</head>

<body>
    <header>
        <h1>Welcome TO YOUR Applicaiton</h1>
        <nav>
       
        <a href="deconnection.php">Déconnexion</a>
        </nav>
    </header>
    <style>
   .skill select{
   
display:flex;
flex-direction:flex;
width:100%;}
    </style>

    <main class="container">

        <!--je recupere le fichier controller qui me permet de recuperer les infos du formulaire et de les envoyer a la bdd -->
        <?php require_once "php/controller/controller.php"; ?>

        <div class="row">
            <section class="col-12">
            <?php echo "<p class='alert alert-success'>Bonjour : " .$_SESSION['nom']."<p>";?>
                <h2>Formulaire de Création</h2>
                <!-- formulaire de creation d'une tache -->
                <form class="form create" method="post">
                   <div class="skill"> 
                <label>1. Maquetter une application</label>
                <select name="skill01" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>2. Réaliser une interface utilisateur web statique et adaptable</label>
                <select name="skill02" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>3. Développer une interface utilisateur web dynamique</label>
                <select name="skill03" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
                <label>4. Développer les composants d’accès aux données</label>
                <select name="skill04" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
                <label>5. Créer une base de données</label>
                <select name="skill05" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
                </div>
                    <div>
                        <input type="hidden" name="formulaire" value="create">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </section>
        </div>

        <div class="row">
            <section class="col-12">
                <h2>Formulaire de Modification</h2>

                <!-- formulaire de modification d'une tache -->
                <form class="form update" method="post">
                    <div>
                        <label for="id">id</label>
                        <input type="text" name="id" class="form-control" id="id">
                    </div>
                  <div class="skill"> 
                <label>1. Maquetter une application</label>
                <select name="skill01" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>2. Réaliser une interface utilisateur web statique et adaptable</label>
                <select name="skill02" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>3.Développer une interface utilisateur web dynamique</label>
                <select name="skill03" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
                <label>4.Créer une base de données</label>
                <select name="skill04" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
                <label>5.Développer les composants d’accès aux données</label>
                <select name="skill05" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>
               </div>
                    <div>
                        <input type="hidden" name="formulaire" value="update">
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </section>
        </div>

        <div class="row">
            <section class="col-12" id="supp">
                <h2>Formulaire pour Supprimer</h2>
                <!-- formulaire pour supprimer d'une tache -->
                <form class="form delete" method="post">
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" name="id" class="form-control" id="id">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="formulaire" class="form-control" value="delete">
                        <button type="submit" class="btn btn-primary">Supprimer</button>
                    </div>
                    
                </form>
            </section>
            <div>
                <?php require_once "php/view/view.php"; ?>
            </div>
    </main>

    <footer>

    </footer>
    <script src="js/app.js"></script>
</body>

</html>