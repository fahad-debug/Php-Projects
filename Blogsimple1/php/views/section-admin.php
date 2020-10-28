
   <div id="blog">

   </div>

  <div class="containerAdmin">
<section>

<!-- Formulaire de Creation  -->
    <form @submit.prevent="sendajax" method="POST" class="formAdmin">
   
    <h3>
        Formulaire De Creation D'ARTICLE
    </h3>
    <input type="hidden" name="id_user" value="<?php echo $retourn_row['id']?>">
    <div class="forms-control">
      <label for="titre">Titre</label>
    <input type="text" name="titre"placeholder="ENTRE LE TITRE">
</div>
<div class="forms-control">
      <label for="titre">Contenu</label>
    <textarea name="contenu" id="" cols="30" rows="10"></textarea>
</div>
<div class="forms-control">
      <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo date("Y-m-d H:i:s")?>">
</div>
<div class="forms-control">
      <label for="titre">categorie</label>
    <input type="text" name="categorie"placeholder="ENTRE La categorie">
</div>

    <input type="hidden" name="form" value="create">

    <button class="btn" type="submit">Publier L'Article</button>


    </form>
     


</section>

     <section>


    <form @submit="sendajax" action="" class="update formAdmin" method="POST">
    <h3>
        Formulaire De Update D'ARTICLE
    </h3>
    <div class="forms-control">
      <label for="id">Id:</label>
    <input type="text" name="id" value="">
    </div>
    <div class="forms-control">
      <label for="titre">Titre:</label>
    <input type="text" name="titre"placeholder="ENTRE LE TITRE">
    </div>
    <textarea name="contenu" id="" cols="30" rows="10"></textarea>

   <div class="forms-control"> 
     <label for="date">Date:</label>
    <input type="date" name="date" value="<?php echo date("Y-m-d H:i:s")?>">

    </div>
    <div class="forms-control">
    <label for="categorie">Categorie</label>
    <input type="text" name="categorie"placeholder="ENTRE La categorie">
    </div>
    <input type="hidden" name="form" value="update">

     <button type="submit" class="btn">Update</button>
           
    </form>
 
<!--   div pour Vue JS -->
</section>
             




    <!-- Formuaire      ___________________     Upload -->
      <section>
 
    <form  enctype="multipart/form-data" action="php/views/section-upload.php" method="post">
    <input type="hidden" name="id_user" value="<?php echo $retourn_row['id']?>">
      <input  type="file" name="photo" id="fileToUpload">
      <input value="submit" type="submit" >

    </form>
        </section>




 
        </div> 
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script>
    var app=new Vue({
   el:"#blog",

    data:{
        message: "hello world"
    },

   methods:{
    
    sendajax:function(event)
    {
  console.log(event.traget);


var form=event.target;

var formData= new FormData(form);

var objetFetch={method:"POST",body:formData};

 fetch("php/class/api.php",objetFetch)
.then((res)=> {return res.json();})
.then(json=>{console.log(json)})
    }},})
</script>
   








    