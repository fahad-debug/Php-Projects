<?php
function connexion(){
    // $bd est une variable ou je stock les infos pour la connection a la bdd
    $db = 'mysql:host=localhost;dbname=school;charsetutf8';
    // $user va contenir le nom utilisateur de la bdd
    $user = 'root';
    // $password contient le mot de passe pour la connexion a la bdd (il est vide)
    $password = '';
    // $options contient des options qui m'affichera des precisions si il y a des erreurs
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

    try {
        // $connectDb contient un objet de la classe PDO qui permet la connection a la bdd
        $connectDb = new PDO($db, $user, $password, $options);
        // echo('connection établie');
    } catch (PDOException $e) {
        echo('la connexion a échoué ' .$e->getMessage());
    }

    return $connectDb;

}

connexion();
function read($table1,$table3,$id)
{
    
//on on appel la fonction connexion pour se connecter a la bdd et on prepare la requete sql pour eviter les injections
    $bdd = connexion();
    //on fait la requete sql
    $sql = "SELECT * FROM $table1,$table3 WHERE s_id=?";

    // on prepare la requeteid_tache
    $pdo = $bdd->prepare($sql);
    // on execute la requete
    $pdo->execute(array($id));
    // on recupere les infos sous forme de tableau et on les stocks ds $resultat
    $resultat = $pdo->fetchAll();
    // on retourne le resultat
    return $resultat;
}


$snak=read("student","detail",1);


foreach($snak as $s){





    extract($s);
    echo $s_name;
    // echo $score;
    // echo $status;
    echo $email_ID;
    echo $school_id;
    echo $accomplishments;
    
  
 }

// j'appelle ma fonction 
//connexion();



