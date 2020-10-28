<?php

require_once "php/model/model.php";

// on fait une fonction pour preparer et et envoyer la requete 
function requeteSql($tab, $sql)
{
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $pdo = connexion()->prepare($sql);
    // on execute la requete
    $pdoStatment = $pdo->execute($tab);
    // et on retourne le resultat
    return $pdoStatment;
}

//READ
function read($table, $id)
{
    //on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $bdd = connexion();
    //on fait la requete sql
    $sql = "SELECT * FROM $table WHERE id_u = ?";
    // on prepare la requeteid_tache
    $pdo = $bdd->prepare($sql);
    // on execute la requete
    $pdo->execute(array($id));
    // on recupere les infos sous forme de tableau et on les stocks ds $resultat
    $resultat = $pdo->fetchAll();
    // on retourne le resultat
    return $resultat;
}


$formulaire = $_POST["formulaire"] ?? "";
// CREATE TACHE TODOLIST
if ($formulaire == "create" && $formulaire !== "") {

    if (
           isset($_POST['skill01']) && !empty($_POST['skill01'])
        && isset($_POST['skill02']) && !empty($_POST['skill02'])
        && isset($_POST['skill03']) && !empty($_POST['skill03'])
        && isset($_POST['skill04']) && !empty($_POST['skill04'])
        && isset($_POST['skill05']) && !empty($_POST['skill05'])
    ) {

        $tab = [
            "id_users" => $_SESSION['id'],
            "nom" => $_SESSION["nom"],
            "skill01" => $_REQUEST["skill01"],
            "skill02" => $_REQUEST["skill02"],
            "skill03" => $_REQUEST["skill03"],
            "skill04" => $_REQUEST["skill04"],
            "skill05" => $_REQUEST["skill05"]
        ];
        

        $sql = "INSERT INTO `skills` (`id_taches`, `id_u`, `nom`, `skill01`, `skill02`, `skill03`,skill04,skill05) VALUES (NULL, :id_users, :nom, :skill01, :skill02, :skill03,:skill04,:skill05);";

        requeteSql($tab, $sql);
    }
}


//UPDATE TACHE TODOLIST
if ($formulaire == "update" && $formulaire !== "") {

    if (
        isset($_POST['id']) && !empty($_POST['id'])
        && isset($_POST['skill01']) && !empty($_POST['skill01'])
        && isset($_POST['skill02']) && !empty($_POST['skill02'])
        && isset($_POST['skill03']) && !empty($_POST['skill03'])
        && isset($_POST['skill04']) && !empty($_POST['skill04'])
        && isset($_POST['skill05']) && !empty($_POST['skill05'])
    ) {

        $tab = [
            "id" => $_REQUEST["id"],
            "nom" => $_SESSION["nom"],
            "skill01" => $_REQUEST["skill01"],
            "skill02" => $_REQUEST["skill02"],
            "skill03" => $_REQUEST["skill03"],
            "skill04" => $_REQUEST["skill04"],
            "skill05" => $_REQUEST["skill05"]
        ];

        $sql = "UPDATE `skills` SET `nom` = :nom, `skill01` = :skill01, `skill02` = :skill02, `skill03` = :skill03 ,`skill04` = :skill04 ,`skill05` = :skill05 WHERE id_taches = :id";

        requeteSql($tab, $sql);
    }
}


//DELETE TACHE TODOLIST
if ($formulaire == "delete" && $formulaire !== "") {

    if (isset($_POST['id']) && !empty($_POST['id'])) {

        $tab = [
            "id" => $_REQUEST["id"],
        ];

        $sql = "DELETE FROM `skills` WHERE id_taches = :id";

        requeteSql($tab, $sql);
    }
}


