<?php 

/*
*Base COntroller
* loads the models and views
*/

class Controller 
{

      public function model($model){

        //Require model file

        require_once "../app/models/".$model.".php";
       
        // Instatiate Model
        return new $model();


      } 

      //Load View

      public function view($view,$data=[])
      {

        if(file_exists("../app/views/" .$view. ".php")){
            require_once "../app/views/" .$view. ".php";
        }

        else 
        {
              // View does not exist
              die("view does not exist");


        }

      }
}