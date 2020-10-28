<?php


// ICI ON VA RECEVOIR LES INFOS DU NAVIGATEUR
// ENVOYEES PAR AJAX

// EN PHP
// ON DES TABLEAUX ASSOCIATIFS (CLE/VALEUR) 
// EN JS
// ON A DES OBJETS (PROPRIETE/VALEUR)
// COOL: LA FONCTION json_encode VA FAIRE LA CONVERSION DE PHP VERS JS
// https://www.php.net/manual/fr/function.json-encode.php


// PROGRAMMATION FONCTIONNELLE
// => JE RANGE MON CODE DANS DES FONCTIONS


// PROGRAMMATION PAR CLASSE  (static) (POO SIMPLIFIEE...)
// => JE RANGE MES FONCTIONS DANS DES CLASSES
class Crudite
{
    // PROPRIETE DE CLASSE (static)
    static $tabAssoReponse = [];

    // METHODE DE CLASSE (static)
    static function cruder ()
    {
        // DEBUG
        // ON VA RENVOYER CE QU'ON RECOIT...
        Crudite::$tabAssoReponse["request"] = $_REQUEST;
        
        $identifiantFormulaire = $_REQUEST["identifiantFormulaire"] ?? "";
        
        
        if ($identifiantFormulaire == "create")
        {
            Crudite::creer();
        }

        if ($identifiantFormulaire == "read")
        {
            // EN PROGRAMMATION PAR CLASSE
            // POUR APPELER UNE METHODE
            // ON PRECISE D'ABORD LA CLASSE ET ENSUITE LA METHODE A APPELER
            // Classe::methode()
            Crudite::lire();
        }

        if ($identifiantFormulaire == "update")
        {
            Crudite::modifier();
        }

        if ($identifiantFormulaire == "delete")
        {
            Crudite::supprimer();
        }

        // ON VA FOURNIR DU JSON
        echo json_encode(Crudite::$tabAssoReponse, JSON_PRETTY_PRINT);
        
    }
    
    // UPDATE
    static function modifier ()
    {
        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL skills
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "titre"          name="titre"
            "id"             =>  $_REQUEST["id"] ?? "",          // IMPORTANT
            "nom"            =>  $_REQUEST["nom"] ?? "",
            "prenom"         =>  $_REQUEST["prenom"] ?? "",
            "skill01"        =>  $_REQUEST["skill01"] ?? "",
            "skill02"        =>  $_REQUEST["skill02"] ?? "",
            "skill03"        =>  $_REQUEST["skill03"] ?? "",
            "skill04"        =>  $_REQUEST["skill04"] ?? "",
            "skill05"        =>  $_REQUEST["skill05"] ?? "",
            "skill06"        =>  $_REQUEST["skill06"] ?? "",
            "skill07"        =>  $_REQUEST["skill07"] ?? "",
            "skill08"        =>  $_REQUEST["skill08"] ?? "",
        ];
        
        $requetePrepareeSQL = 
<<<CODESQL
    
        UPDATE skills
        SET
            nom          = :nom,
            prenom       = :prenom,
            skill01      = :skill01,
            skill02      = :skill02,
            skill03      = :skill03,
            skill04      = :skill04,
            skill05      = :skill05,
            skill06      = :skill06,
            skill07      = :skill07,
            skill08      = :skill08
        WHERE id = :id
CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE CREATE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC L'ID QUI VIENT D'ETRE CREE... 
        Crudite::lire();
    }

    // DELETE
    static function supprimer ()
    {
        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL skills
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "titre"          name="titre"
            "id"         =>  $_REQUEST["id"] ?? "",
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        DELETE FROM skills
        WHERE id = :id
    
CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE DELETE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC L'ID QUI VIENT D'ETRE SUPPRIMEE... 
        Crudite::lire();

    }

    // CREATE
    static function creer ()
    {
        // ON VA MAINTENANT RECUPERER CHAQUE INFO DU FORMULAIRE
        // ET ENSUITE LES STOCKER DANS LA TABLE SQL skills
        $tabAssoColonneValeur = [
            // COLONNE SQL      HTML
            // "titre"          name="titre"
            "nom"            =>  $_REQUEST["nom"] ?? "",
            "prenom"         =>  $_REQUEST["prenom"] ?? "",
            "skill01"        =>  $_REQUEST["skill01"] ?? "",
            "skill02"        =>  $_REQUEST["skill02"] ?? "",
            "skill03"        =>  $_REQUEST["skill03"] ?? "",
            "skill04"        =>  $_REQUEST["skill04"] ?? "",
            "skill05"        =>  $_REQUEST["skill05"] ?? "",
            "skill06"        =>  $_REQUEST["skill06"] ?? "",
            "skill07"        =>  $_REQUEST["skill07"] ?? "",
            "skill08"        =>  $_REQUEST["skill08"] ?? "",
        ];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
        INSERT INTO `skills` 
        (`id`, `nom`, `prenom`, `skill01`, `skill02`, `skill03`, `skill04`, `skill05`, `skill06`, `skill07`, `skill08`) 
        VALUES 
        (NULL, :nom, :prenom, :skill01, :skill02, :skill03, :skill04, :skill05, :skill06, :skill07, :skill08 );
    
CODESQL;
        
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);
    
        // ON FAIT AUSSI UN READ APRES LE CREATE POUR RENVOYER LA NOUVELLE LISTE 
        // AVEC L'ID QUI VIENT D'ETRE CREE... 
        Crudite::lire();

    }

    // READ
    static function lire ()
    {
        // ON VA AJOUTER LE CODE PHP
        // POUR FAIRE UN READ
        // POUR ENVOYER LA LISTE DES IDs AU NAVIGATEUR
        $tabAssoColonneValeur = [];
    
        $requetePrepareeSQL = 
<<<CODESQL
    
    SELECT * FROM skills
    ORDER BY id DESC
    
CODESQL;
    
        // ON PASSE PAR LA METHODE envoyerRequeteSQL QUI EST DANS LA CLASSE Model
        $pdoStatement = Model::envoyerRequeteSQL($requetePrepareeSQL, $tabAssoColonneValeur);

        // ON RECUPERE LES LIGNES SQL EN PHP DANS UN TABLEAU ASSOCIATIF
        $tabAssoLigne = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
        // JE L'AJOUTE DANS LE TABLEAU DE REPONSE A ENVOYER AU NAVIGATEUR
        Crudite::$tabAssoReponse["tableauArticle"] = $tabAssoLigne;

    }
}


class Model
{
    // CONNEXION A LA BASE
    // METHODE STATIC DE CLASSE
    static function envoyerRequeteSQL ($requetePrepareeSQL, $tabAssoColonneValeur)
    {
        // POUR AJOUTER LA LIGNE DANS LA TABALE SQL
        // ETAPE1: SE CONNECTER A LA BASE DE DONNEES
        // https://www.php.net/manual/fr/pdo.construct.php
        $pdo = new PDO("mysql:host=localhost;dbname=skills-management_project;charset=utf8", "root", "");
    
        // SECURITE: POUR SE PROTEGER CONTRE LES INJECTIONS SQL
        // POUR ENVOYER LA REQUETE
        // ON SEPARE LES INFOS DE LA REQUETE SQL PREPAREE
        $pdoStatement = $pdo->prepare($requetePrepareeSQL);
        $pdoStatement->execute($tabAssoColonneValeur);

        // DEBUG: A ACTIVER SEULEMENT EN CAS DE PROBLEME
        // https://www.php.net/manual/fr/pdostatement.debugdumpparams.php
        // $pdoStatement->debugDumpParams();

        // POUR POUVOIR FAIRE LE READ...
        return $pdoStatement;
    }
}


// TRES IMPORTANT : POUR ACTIVER MON CODE 
// => J'APPELLE LA METHODE STATIC DE LA CLASSE
Crudite::cruder();