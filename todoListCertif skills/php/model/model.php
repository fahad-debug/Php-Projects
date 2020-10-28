<?php

function connexion(){
    // $bd est une variable ou je stock les infos pour la connection a la bdd
    $db = 'mysql:host=localhost;dbname=skillscertif;charsetutf8';
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

// j'appelle ma fonction 
//connexion();
