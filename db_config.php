<?php

class DB_config{
    private $host="localhost";
    private $db_name="fatma_news";
    private $db_user="root";
    private $dp_password="";
    private  $pdo;
    

 
 function __construct()
 {
    $this->pdo=new PDO("mysql:host=$this->host;dbname=$this->db_name",
    $this->db_user,$this->dp_password);
   

 }


 function connect(){
     return $this->pdo;
 }

 

}

?>