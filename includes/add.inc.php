    <?php
    require_once "../header.php";
    require_once "dbcon.inc.php";
   
    if(isset($_POST['save'])){
         


          if(!empty($_POST['title'])){
            $At = $_POST['title'];
           

            $title = filter_var($At, FILTER_SANITIZE_STRING);
         

          }else{
            $titleM = '<p style="color:red;">Your blog requires a title</p> ';
          }

          if( !empty($_POST['body']) ){
            $Ab = $_POST['body']; 

            $body = filter_var($Ab, FILTER_SANITIZE_STRING);
          }else{
            $bodyM = '<p style="color:red;">fill in this body field</p> ';
          }
         
    }
?>
