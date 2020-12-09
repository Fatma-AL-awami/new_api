<?php 
 include('../dpconfig.php');  
class Category{

    public $id;
    public $title;
    public $sub_title;
    private $pdo;
    public $query;
    public $pdo_news;

    function __construct()
    {
      
        $this->pdo_news=new DB_config();
       
    }
    
//getalltable
    public function getRow()
    {
        $pdo=$this->pdo_news->connect();
        $query = $this-> $pdo->prepare("select * from category");
        $query->execute();
       return $query->fetchAll(PDO::FETCH_OBJ);
        
    }

    //getbyid
    public function getRowById($id)
    {
        $pdo=$this->pdo_news->connect();
        $query = $this-> $pdo->prepare("select * from category where id=?");
        $query->execute([$id]);
      return $query->fetchAll(PDO::FETCH_OBJ);
        
    }

    //getbytitle
    public function getRowByTitle($title)
    {
        $pdo=$this->pdo_news->connect();
        $query = $this-> $pdo->prepare("select * from category where title like ?");
        $query->execute([$title]);
       return $query->fetch(PDO::FETCH_OBJ);
       
    }


    //getbysub_title
    public function getRowBySubTitle($sub_title)
    {
        $pdo=$this->pdo_news->connect();
        $query = $this->$pdo->prepare("select * from category where sub_title like ?");
        $query->execute([$sub_title]);
         return $query->fetch(PDO::FETCH_OBJ);
        
    }

    //add
    public function addRow($data)
    {
        $pdo=$this->pdo_news->connect();
        $stat=$pdo->prepare('insert into category values(null,?,?,?,?,?)');
        $stat->execute([$this->title,$this->details]);  
    }


    //update
    public function updateCategory($id)
    {
        $news = $this->getRow($id);
        $news->title =  $this->title : "";
       $news->sub_title =  $this->image : "";

       $pdo=$this->pdo_news->connect();
       $query = $this-> $pdo->prepare("UPDATE `categort` SET `title`=?,`sub_title`=?, WHERE id = ?");

     $query->execute([$this->title, $this->sub_title,$this->category_id, $id]);   
    }


    //delete
    public function deleteCategory($id)
    {
        $pdo=$this->pdo_news->connect();
        $query = $this-> $pdo->prepare("delete from category where id=?");
            $query->execute([$id]);  
    }
}

?>