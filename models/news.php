<?php

include ('../db_config.php');
include('Category.php');

class news{

    public $id;
    public $title;
    public $image;
    public $details;
    public $id_category;
    public $pdo_news;
    public $query;



    function __construct()
{

    $this->pdo_news=new DB_config();
  
   
}


//getrows
function getRows()
{

$pdo=$this->pdo_news->connect();
$stat= $pdo->prepare("SELECT * FROM news_details ");
$stat->execute();
return $stat->fetchAll(PDO::FETCH_OBJ);

}

//getrow_id
function get_one_Rows($id)
{

$pdo=$this->pdo_news->connect();
$stat= $pdo->prepare("select from news_details where id =?");
$stat->execute();
return $stat->fetchAll(PDO::FETCH_OBJ);


}
//getrowbycategoryid
public function getRowsByCategory_id($id_category)
    {
        $pdo=$this->pdo_news->connect();
        $query = $this->$pdo->prepare("select id,title from news_details where category_id=?");
        $query->execute([$id_category]);
        return  $query->fetchAll(PDO::FETCH_OBJ);
      
    }

   // getRowfootball
    public function getFootball()
    {
        
        $category = new Category();
        $category = $category->getRowBySubTitle("football");
        return  $this->getRowsByCategory_id($id_category);
         
    }   

 
//add row
function addRow($data){

    $pdo=$this->pdo_news->connect();
    $stat=$pdo->prepare('insert into news_details values(null,?,?,?,?,?)');
    $stat->execute([$this->title,$this->details]);
}


// update
public function updateRow($id)
    {
        $news = $this->get_one_Rows($id);
        $news->title =  $this->title : "";
       $news->image =  $this->image : "";
       $news->details =  $this->details : "";
     $news->category_id =  $this->category_id : "";

     $pdo=$this->pdo_news->connect();
       $query = $this-> $pdo->prepare("UPDATE `news_details` SET `title`=?,`image`=?,
     `details`=?,`category_id`=? WHERE id = ?");
     $query->execute([$this->title, $this->image, $this->details, $this->category_id, $id]);
   
        
    }
    function deleteRow($id)
    {
        $pdo=$this->pdo_news->connect();
 
            $query = $this->$pdo->prepare("delete from news_details where id=?");
            $query->execute([$id]);
           
    }
    }



?>