//CREATE
// je vais selectionner les bouton  supprimer dans la liste grace a la classe supprimer
let btnSuppr = document.querySelectorAll('.supprimer');
// je selectionne l'input qui est dans le formulaire de delete pour mettre dedans l'id du bouton clické
let input = document.querySelector(".delete input[name=id]");
// on fait une boucle sur tout les boutons supprimer
btnSuppr.forEach(function(button){
    // on ecoute sur quel bouton l'utilisateur va clicker
    button.addEventListener('click', function(event) {
        // on recupere le bouton sur lequel l'utilisateur a clique
        let btnId = event.target.getAttribute('id');
        // on met dans l'input du formulaire de delete la valeur de l'id du bouton clické
        input.value = btnId;
        //je cree une variable pour la confirmation de la suppression qui contient une fenetre de confirmation
        let confirmation = window.confirm("etes vous sur de vouloir supprimer ?");
        // on fait une conditions pour confirmer la suppresion
        if (confirmation) {
             //on selectionne le bouton du formulaire delete et on associe l'evenement du click utilisateur a ce bouton
            document.querySelector(".delete button[type=submit]").click();
        }
    })
})
// je vais selectionner les bouton  modifier dans la liste grace a la classe modifier
let btnModif = document.querySelectorAll('.modifier');
// on fait une boucle sur tout les boutons modifier
btnModif.forEach(function(button){
    // on ecoute sur quel bouton l'utilisateur va clicker
    button.addEventListener('click', function(event) {
        // on recupere l'id du bouton sur lequel l'utilisateur a clique
        let btnId = event.target.getAttribute('id');
        let btnskill1 = event.target.getAttribute('skill01');
        let btnskill2 = event.target.getAttribute('skill02');
        let btnskill3 = event.target.getAttribute('skill03');
        let btnskill4  = event.target.getAttribute('skill04');
        let btnskill5 = event.target.getAttribute('skill05');
        // on met dans l'input du formulaire de update les valeurs du bouton clické
         document.querySelector(".update input[name=id]").value = btnId;
         document.querySelector(".update select[name=skill01]").value = btnskill1;
         document.querySelector(".update select[name=skill02]").value = btnskill2;
         document.querySelector(".update select[name=skill03]").value =btnskill3;
         document.querySelector(".update select[name=skill03]").value =btnskill4;
         document.querySelector(".update select[name=skill03]").value =btnskill5;
    })
})



