<?php

include('../models/news.php');
$news_model=new news();

echo json_encode($news_model->getRows());

if(isset($_POST &&! empty($_POST))){

    if(($_GET['id'] != 0)) 
    {
    //echo $_POST['title'];
    //echo $_POST['details'];
    $news_model->title=$_POST['title'];
    $news_model->detailst=$_POST['details'];
    $news_model->detailst=$_POST['image'];
    $news_model->detailst=$_POST['category_id'];

   // $news_model->title=strip_tags($news_model->title);
   // $news_model->details=strip_tags($news_model->details);

//add
   if( $news_model->addRow()){
       $feedback['code']=2090;
       $feedback['message']="successfull";
   }else{
    $feedback['code']=2000;
    $feedback['message']="failed";
   }

   echo json_encode($feedback);
}

//update
else{
  
   $news_model->title=$_POST['title'];
   $news_model->detailst=$_POST['details'];
   $news_model->detailst=$_POST['image'];
   $news_model->detailst=$_POST['category_id'];

   if ($news->update($_GET['id'])) {
    echo " updated successfuly ";
} else {
    echo " updated faild";
}
}



//getsinglerow
else if(isset($_GET['id'])){
    echo jason_encode($news_model-> get_one_Rows($_GET['id']));
}

else{
    echo jason_encode($news_model->getRows());
}
}

//delete

else{

    if ($method == "DELETE") {
        if ($news->deleteRow($_GET['id'])) {
            echo "deleted successfuly ";
        } else {
            echo "deleted faild ";
        }
}


}

?>