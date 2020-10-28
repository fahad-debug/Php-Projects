<?php

class Pages extends Controller 
{

    public function __construct()

    {  
        
      
        
    }

    public function index()
    {
           if(isLoggedIn()){
               redirect("posts");
           }

         $data=['title'=>"Welcome","description"=>"Simple social network"];

         $this->view("pages/index",$data);

        

    }

 

    public function about(){
        $data=['title'=>"About US","description"=>"Share With your Friends"];
           
        $this->view("pages/about",$data);
    }
}