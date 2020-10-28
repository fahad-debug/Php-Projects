<?php  session_start();
   
                               
 
 // Check if the user is logged in, if not then redirect him to login page
 if(!isset($_SESSION["login"]) || $_SESSION["login"] !== true){
     header("location: index.php");
     exit;
 }
require_once "header.php";?>
       
        <h2>Hello           <?php echo htmlspecialchars($_SESSION["username"]); ?></h2>

        <!-- ------------------------------- CREATE -------------------------------------- -->
        <section>
                      
            <h3>FORMULAIRE DE CREATION DE COMPETENCES</h3>
            
            <form class="ajax" action="" method="POST">
                <label>Nom</label>
                <input type="text" name="nom" placeholder="Entrer votre Nom" required>
                <label>Prénom</label>
                <input type="text" name="prenom" placeholder="Entrer votre Prénom" required>

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

                <label>4. Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce</label>
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

                <label>6. Développer les composants d’accès aux données</label>
                <select name="skill06" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>7. Développer la partie back-end d’une application web ou web mobile</label>
                <select name="skill07" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>8. Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu ou e-commerce</label>
                <select name="skill08" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <button type="submit" class="big-button">ENVOYER</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="create">

                <div class="confirmation">

                </div>

            </form>
        </section>

        <!-- ------------------------------- UPDATE -------------------------------------- -->
        <section>
        <h3>FORMULAIRE DE MODIFICATION DE COMPETENCES</h3>

        <form class="ajax update" action="" method="POST">
                <label>Nom</label>
                <input type="text" name="nom" placeholder="Entrer votre Nom" required>
                <label>Prénom</label>
                <input type="text" name="prenom" placeholder="Entrer votre Prénom" required>

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

                <label>4. Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce</label>
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

                <label>6. Développer les composants d’accès aux données</label>
                <select name="skill06" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>7. Développer la partie back-end d’une application web ou web mobile</label>
                <select name="skill07" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <label>8. Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu ou e-commerce</label>
                <select name="skill08" size="1">
                    <option>Niveau-1
                    <option>Niveau-2
                    <option>Niveau-3
                </select>

                <!-- IMPORTANT NE PAS OUBLIER L'ID DE LA LIGNE -->
                <label id="id" for="id">ID</label>
                <input type="number" name="id" required placeholder="Entrez l'ID de la Ligne">

                <button type="submit" class="big-button">MODIFIER</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="update">

                <div class="confirmation">
                
                </div>

            </form>
        </section>

        <!-- ------------------------------- DELETE -------------------------------------- -->
        <!-- <section class="cache"> SI L'ON VEUT CACHER LE FORMULAIRE SI ON LAISSE LE BOUTON SUPPRIMER DANS LE READ  -->
        <section>
            <h3>FORMULAIRE DE SUPRESSION D'UNE ID DANS LE TABLEAU</h3>      
            <form class="ajax delete" action="">
                <input type="number" name="id" required placeholder="Entrez l'ID de la Ligne">
                <button type="submit" class="big-button">SUPPRIMER</button>
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="delete">
            </form>
        </section>

        <!-- ------------------------------- READ -------------------------------------- -->
        <section>
            <h3>AFFICHAGE DU TABLEAU DES ID ET COMPETENCES</h3>
            <!-- FORMULAIRE POUR RAFRAICHIR LA LISTE DES COMPETENCES -->
            <form class="ajax read" action="" method="POST">

                <button type="submit" class="big-button cache">RAFRAICHIR LE TABLEAU DES COMPETENCES</button>
                
                <!-- ON AJOUTE UNE INFO NON VISIBLE AU VISITEUR MAIS QUI SERA ENVOYEE AU SERVEUR -->
                <input type="hidden" name="identifiantFormulaire" value="read">
            </form>
            <div class="listSkill">
                <!-- 
                <article>
                    <h4>nom</h4>
                    <h5>prenom</h5>
                    <h6>1. Maquetter une application</h6>
                    <p>skill01</p>
                    <h6>2. Réaliser une interface utilisateur web statique et adaptable</h6>
                    <p>skill02</p>
                    <h6>3. Développer une interface utilisateur web dynamique</h6>
                    <p>skill03</p>
                    ...
                </article>
                -->
                
            </div>      
        </section>


    <script>
    // ON VA PRENDRE LA MAIN SUR LE FORMULAIRE
    // ON VA BLOQUER L'ENVOI CLASSIQUE DU FORMULAIRE    => EVENEMENT submit SUR LE FORMULAIRE
    // ET ON VA ENVOYER LES INFOS DU FORMULAIRE PAR AJAX
    // AVANTAGE: ON NE RECHARGE PAS LA PAGE... 
    //          (PLUS FLUIDE POUR LE VISITEUR, PLUS PERFORMANT...)
    // ETAPE1: DECLARATION DE LA FONCTION
    // => CODE EN ATTENTE
    // POUR SAVOIR QUE CETTE FONCTION CALLBACK A UN PARAMETRE => DOC DE JS...
    // PB: querySeclector NE PERMET DE SELECTIONNER QU'UNE SEULE BALISE
    // MAIS MAINTENANT, ON A PLUSIEURS FORMULAIRES EN AJAX
    // var formulaire = document.querySelector("form.ajax");
    var listeFormulaire = document.querySelectorAll("form.ajax");
    // ON FAIT UNE BOUCLE POUR AGIR SUR CHAQUE FORMULAIRE UN PAR UN
    listeFormulaire.forEach(function(formulaire){
        // POUR CHAQUE FORMULAIRE
        // ON VA BLOQUER LE FONCTIONNEMENT CLASSIQUE
        // ET ON VA ENVOYER LES INFOS PAR AJAX
        formulaire.addEventListener("submit", envoyerFormulaireAjax);
    });
    // QUAND ON CHARGE LA PAGE
    // ON VA AUTOMATIQUEMENT DECLENCHER LE CLICK SUR LE FORMULAIRE read
    // => CA EVITE AU VISITEUR DE LE FAIRE
    document.querySelector("form.read button[type=submit]").click();
    // LA FONCTION envoyerFormulaireAjax SERA APPELEE PAR JS (PAS PAR MOI)
    //      (ET JS FOURNIRA LE PARAMETRE event...)
    // QUAND IL SE PRODUIRA L'EVENEMENT submit SUR LE FORMULAIRE
    // (QUAND LE VISITEUR VA APPUYER SUR LE BOUTON "CREER UNE TACHE")
    // => FONCTION "CALLBACK"
 
    // VERSION1: CLASSIQUE
function envoyerFormulaireAjax (event) 
{
    // LE PARAMETRE event NOUS SERT A BLOQUER LE FORMULAIRE CLASSIQUE...
    event.preventDefault();
    console.log("FORMULAIRE AJAX EN COURS...");
    // https://developer.mozilla.org/fr/docs/Web/Guide/Using_FormData_Objects
    // ON VA RECUPERER LES INFOS DU FORMULAIRE
    // ET ENSUITE ON VA ENVOYER LE REQUETE AJAX AVEC fetch
    var formulaire = event.target;
    // ON VA UTILISER UN OBJET DE LA CLASSE FormData
    // => CET OBJET SERVIRA DE CONTAINER AUX INFOS DU FORMULAIRE
    var formData = new FormData(formulaire);    
                                    // => AUTOMATIQUEMENT, 
                                    // formData VA ASPIRER TOUTES LES INFOS DU formulaire
                                    // COOL POUR NOUS ;-p
    // MAINTENANT ON PEUT ENVOYER LA REQUETE AJAX AVEC fetch
    var contenuForm = 
    {
        method: 'POST',     // NECESSAIRE POUR UPLOAD DE FICHIER
        body:   formData
    };
    // LA FONCTION fetch DE JS ENVOIE UNE REQUETE AJAX VERS api-ajax.php (le premier paramètre)
    fetch("../class/Api.php", contenuForm)
    // POUR LE READ IL FAUT COMPLETER LE CODE POUR RECUPERER LES DONNEES RENVOYEES PAR LE SERVEUR
    .then(function(responseServer) {
        // DEBUG
        console.log(responseServer);
        // EXTRAIRE UN OBJET JS DEPUIS LA REPONSE DU SERVEUR
        return responseServer.json();
    })
    .then(function(objetJSON) {
        // DEBUG
        console.log(objetJSON);
        // SI LE TABLEAU DES ARTICLES EST FOURNI PAR LE SERVEUR
        // ALORS JE VAIS M'EN SERVIR POUR CONSTRUIRE LE HTML
        if ('tableauArticle' in objetJSON)
        {
            // ON COPIE LE TABLEAU DANS NOTRE VARIABLE tableauArticle
            tableauArticle = objetJSON.tableauArticle;
            // => CE TABLEAU JSON SERA EN FAIT FOURNI PAR LE SERVEUR WEB (PHP + TABLE SQL)
            // => LES PROPRIETES SERONT CONSTRUITES A PARTIR DES NOMS DES COLONNES SQL
            rafraichirListeArticle();
        }
    })
    ;
};
var tableauArticle = [];    // CE SERA LE SERVEUR QUI VA ME CONSTRUIRE CE TABLEAU

// PROGRAMMATION FONCTIONNELLE
// => JE RANGE MON CODE DANS DES FONCTIONS
function rafraichirListeArticle ()
{
    // ON REMET LA LISTE A ZERO
    var baliseListSkill = document.querySelector(".listSkill");
    baliseListSkill.innerHTML = '';
    for(var indice=0; indice < tableauArticle.length; indice++)
    {
        var article = tableauArticle[indice];
        var codeHTML = 
        `
                    <article>
                        <h4>${article.nom}</h4>
                        <h5>${article.prenom}</h5>
                        <p class="id">ID ${article.id}</p>
                        <h6>1. Maquetter une application</h6>
                        <p class="statut ${article.skill01}">${article.skill01}</p>
                        <h6>2. Réaliser une interface utilisateur web statique et adaptable</h6>
                        <p class="statut ${article.skill02}">${article.skill02}</p>
                        <h6>3. Développer une interface utilisateur web dynamique</h6>
                        <p class="statut ${article.skill03}">${article.skill03}</p>
                        <h6>4. Réaliser une interface utilisateur avec une solution de gestion de contenu ou e-commerce</h6>
                        <p class="statut ${article.skill04}">${article.skill04}</p>
                        <h6>5. Créer une base de données</h6>
                        <p class="statut ${article.skill05}">${article.skill05}</p>
                        <h6>6. Développer les composants d’accès aux données</h6>
                        <p class="statut ${article.skill06}">${article.skill06}</p>
                        <h6>7. Développer la partie back-end d’une application web ou web mobile</h6>
                        <p class="statut ${article.skill07}">${article.skill07}</p>
                        <h6>8. Elaborer et mettre en oeuvre des composants dans une application de gestion de contenu ou e-commerce</h6>
                        <p class="statut ${article.skill08}">${article.skill08}</p>
                        <button class="update" data-indice="${indice}" data-id="${article.id}">modifier</button>
                        <button class="delete" data-id="${article.id}">supprimer</button>
                    </article>
        `;
        // <button class="update" data-indice="${indice}" data-id="${article.id}">modifier</button>
        //                 <button class="delete" data-id="${article.id}">supprimer</button>
        // AJOUTER DANS LA BALISE listSkill
        baliseListSkill.innerHTML += codeHTML;
    }

    // CHRONOLOGIE: 
    // JE DOIS ATTENDRE QUE LES BOUTONS SOIENT RAJOUTES AVEC LES ARTICLES
    // ET ENSUITE JE PEUX AJOUTER LES EVENT LISTENER DESSUS

    // UNE FOIS QU'ON A CREE LES ARTICLES AVEC LES BOUTONS SUPPRIMER
    // ON VA AJOUTER UN EVENT LISTENER SUR CHAQUE BOUTON
    var listeBoutonModifier = document.querySelectorAll(".listSkill button.update");
    listeBoutonModifier.forEach(function(bouton) {
        bouton.addEventListener("click", modifierLigne);
    });

    var listeBoutonSupprimer = document.querySelectorAll(".listSkill button.delete");
    listeBoutonSupprimer.forEach(function(bouton) {
        bouton.addEventListener("click", supprimerLigne);
    });
}

function modifierLigne (event)
{
    // DEBUG
    console.log(event.target);
    var bouton = event.target;
    // JE RECUPERE indice CORRESPONDANT DANS tableauArticle
    var indice = bouton.getAttribute("data-indice");
    var article = tableauArticle[indice];
    // DEBUG
    console.log(article);

    // MAINTENANT IL FAUT COPIER LES INFOS DANS LE FORMULAIRE
    // id, nom, prenom, skill01, skill02...
    document.querySelector("form.update input[name=id]").value = article.id;
    document.querySelector("form.update input[name=nom]").value = article.nom;
    document.querySelector("form.update input[name=prenom]").value = article.prenom;
    document.querySelector("form.update input[name=skill01]").value = article.skill01;
    document.querySelector("form.update input[name=skill02]").value = article.skill02;
    document.querySelector("form.update input[name=skill03]").value = article.skill03;
    document.querySelector("form.update input[name=skill04]").value = article.skill04;
    document.querySelector("form.update input[name=skill05]").value = article.skill05;
    document.querySelector("form.update input[name=skill06]").value = article.skill06;
    document.querySelector("form.update input[name=skill07]").value = article.skill07;
    document.querySelector("form.update input[name=skill08]").value = article.skill08;

}

// FONCTION DE CALLBACK SUR LE CLICK DU BOUTON SUPPRIMER
function supprimerLigne (event)
{
    // DEBUG
    console.log(event.target);
    var bouton = event.target;
    // JE RECUPERE id DE LA LIGNE A SUPPRIMER
    var id = bouton.getAttribute("data-id");
    // ET JE COPIE id DANS LE FORMULAIRE
    var inputId = document.querySelector("form.delete input[name=id]");
    inputId.value = id;

    // MAINTENANT ON VA DECLENCHER L'ENVOI DU FORMULAIRE DE DELETE
    // document.querySelector("form.delete").submit(); // ENVOI SANS AJAX
    document.querySelector("form.delete button[type=submit]").click();
}


    </script>

  
<?php require_once "footer.php";?>