<?php

require_once "php/controller/controller.php";

// on stock les données de la bdd qu'on recupere sous la forme d'un tableau asso grace a la fonction read
$table = "skills";
$id = $_SESSION['id'];
$tableau = read("skills", $id);

//on fait un echo pour afficher les resultats
echo '
    <table class="table">
        <thead>
            <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>1. Maquetter une application</th>
            <th>2. Réaliser une interface utilisateur web statique et adaptable</th>
            <th>3.Développer une interface utilisateur web dynamique</th>
            <th>4.Créer une base de données</th>
            <th>5.Développer les composants d’accès aux données</th>
            <th>Modifier</th>
            <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
    ';

foreach ($tableau as $tab) {
    //on recupere les valeurs du tableau dans des variables du meme nom
    extract($tab);
    // on affiche les valeurs
    echo "
            <tr>
                <td>$id_taches</td>
                <td>$nom</td>
                <td>$skill01</td>
                <td>$skill02</td>
                <td  class=''>$skill03</td>
                <td  class=''>$skill04</td>
                <td  class=''>$skill05</td>
                <td><button type='button' class='btn btn-success modifier' id='$id_taches' nom='$nom' skill1='$skill01' skill02='$skill02' skill03='$skill03'skill04=$skill04 skill05=$skill05 >modifier</button></td>
                <td><button type='button' class='btn btn-danger supprimer' id=$id_taches>supprimer</button></td>
            </tr>
        </tbody>
        ";
}
