                 <?php 
                 
                 class Article{

                   public function newarticle($query)
                   {
                     $db = new db();
                     $result = $db->query($query);

                     if ($result === true) {
                       return true;
                     } else {
                       return false;
                     }
                   }

                   public function listarticle($edit = true) {
                    $db = new db();

                    if($edit)
                    {
                      $postid = isset($_GET['id']) ? $_GET['id'] : '';
                      $query = "SELECT * FROM article WHERE postid ='$postid' ";
                      $result = $db->select($query);
                      return $result;
                    }
                    else
                    {
                     $query = "SELECT postid, posttitle, postdescription, postcategory, apic, username FROM article  ORDER BY postid DESC LIMIT 10";

                     $result = $db->select($query);

                     return $result;
                   }

                 }
                 public function deletearticle($query) {

                   $db = new db();
                   $postid = isset($_GET['id']) ? $_GET['id'] : '';               
                   $query = "DELETE  FROM article WHERE postid ='$postid' ";

                   $result = $db->query($query);

                   if ($result === true) {
                           header('Location: index.php?action=listpost');
     $_SESSION['success'] = "The post has been sucessfully deleted";
                   } else {
                         header('Location: index.php?action=listpost');
     $_SESSION['error'] = "Sorry! we could not delete the post ";
                   }
                 }

                 public function editarticle($query) {

                   $db = new db();
                   $result = $db->query($query);

                   if ($result === true) {
                     return true;
                   } 
                   else 
                   {
                     return false;
                   }                             
                 }

                 public function getabout( ) {
                  $db = new db();
                  $query = "SELECT * FROM about  ";
                  $result = $db->select($query);

                  return $result;
                }



                public function editabout($query) {

                 $db = new db();
                 $result = $db->query($query);
                 if ($result === true) {
                   return true;
                 } 
                 else 
                 {
                   return false;
                 }
               }


               public function getmessages()
               {

                 $db = new db();


                 $query = " SELECT * FROM messages ";
                 $result= $db->select($query);
                 return $result;


               } 

               public function message($query)
               {
                 $db = new db();
                 $result = $db->query($query);

                 if ($result === true) {
                   return true;
                 } else {
                   return false;
                 }
               }

               public function search($query)
               {
       //include 'db.php';

                $db = new db();
                      //var_dump($db);die;

                $result = $db->select($query);
               // var_dump($result);die();

   return $result;
      // header('Location: ../index.php?action=search');
 
             }
            

             public function json() {
              $db = new db();

              $query = "SELECT postid,posttitle, postdescription FROM article ";

              $result = $db->select($query);     
              return $result;


 //echo json_encode($encode);  die;
            }



          }
