<?php ob_start(); ?>


 <?php 
$id= $_SESSION['userid'];
$user = new User();

$udetail = $user->edit($id);
  ?>
<?php 

if($_POST)
{
   if (isset($_POST['login']))
   {
    if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"])
    {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * from users where username='$username' and password = '$password'";
    $user = new User();
    $result = $user->login($sql);

    if(!empty($result)) {
        $_SESSION['userid'] = $result[0]['userid'];

        header('Location: index.php?action=dashboard');
    } else{

       $_SESSION['error'] = "The username and password does not match";
       header('Location: index.php?action=login');
       
   }

    }
    else 
    {
      $_SESSION['error'] = "The catche does not match";
      header('Location: index.php?action=login');
    }
    
    

}
else if(isset($_POST['search'])){

 
     $rawquery = $_POST['query']; 

     // $rawquery = htmlspecialchars($rawquery); 

// $rawquery = mysql_real_escape_string($rawquery); 


$query= "SELECT * FROM article
            WHERE `posttitle` LIKE '%".$rawquery."%'";
//var_dump($query);die;
$search = new Article();

$result = $search->search($query);
//var_dump($result) ;die;

//var_dump($result);die;
if($result){  
  
       header('Location: ../index.php?action=search');
 
       }
       else{
         header('Location: ../index.php?action=search');
        $_SESSION['error'] = "no result found";
    }

         
    }

else if (isset($_POST['newarticle']))
{
//$_SESSION['pagetitle'] = 'newarticle';
    $posttitle = $_POST['posttitle'];
    $postdescription = $_POST['postdescription'];
    $postcategory = $_POST['postcategory'];
    $postmetatag = $_POST['postmetatag'];
    $userdata =  $udetail[0]['username'];
        // $postdate = $_POST['postdate'];
        // 
        $tmp_name = $_FILES["avatar"]["tmp_name"];

        $name = $_FILES["avatar"]["name"];
         $name = $_FILES["avatar"]["name"];
    $filename = strtolower($_FILES['uploadfile']['name']);
$whitelist = array(‘jpg’, ‘png’, ‘gif’, ‘jpeg’); #example of white list
$backlist = array(‘php’, ‘php3′, ‘php4′, ‘phtml’, ‘exe’ );
if(!in_array(end(explode(‘.’, $fileName)), $whitelist))
{

 $_SESSION['success'] = "  Invalid file type, please upload valid Image";
        header('Location: index.php?action=newpost');
exit(0);
}
if(in_array(end(explode(‘.’, $fileName)), $backlist))
{
 $_SESSION['success'] = "   Invalid file type, please upload valid Image";
        header('Location: index.php?action=newpost');
exit(0);
}
if(!eregi(‘image/’, $_FILES[$upload_name]['type']))
    $_SESSION['success'] = "   Please upload a valid file!";
        header('Location: index.php?action=newpost');


// Validate that it is an image
$imageinfo = getimagesize($_FILES[$upload_name]['tmp_name']);
if($imageinfo['mime'] != ‘image/gif’ && $imageinfo['mime'] != ‘image/jpeg’ && $imageinfo['mime'] != ‘image/png’ && isset($imageinfo))
 $_SESSION['success'] = "   Sorry, we only accept GIF and JPEG images";
        header('Location: index.php?action=newpost');



// Validate file name (for our purposes we’ll just remove invalid characters)
$file_name = preg_replace('/[^'.$valid_chars_regex.']|\.+$/i', ”, strtolower(basename($_FILES[$upload_name]['name'])));
if (strlen($file_name) == 0 || strlen($file_name) > $MAX_FILENAME_LENGTH)
 $_SESSION['success'] = "  Invalid file name";
        header('Location: index.php?action=newpost');


// Validate that we won’t over-write an existing file
if (file_exists($save_path . $file_name))
     $_SESSION['success'] = "   File with this name already exists";
        header('Location: index.php?action=newpost');

          move_uploaded_file($tmp_name, "/home/u956652776/public_html/uploads/$name");

    $sql = "INSERT INTO article (posttitle,postdescription,postcategory,postmetatag,apic,username)
    VALUES ('$posttitle','$postdescription','$postcategory','$postmetatag','$name','$userdata')";

    $article = new Article();
    $result = $article->newarticle($sql);
    if(!empty($result)) 
    {

       header('Location: index.php?action=newpost');
     $_SESSION['success'] = "The post has been sucessfully inserted";
 } 
 else
 {
   $_SESSION['error'] = "There was an error:";
}

}

//function to edit the about page
else if(isset($_POST['editabout'])) 
    {

        $title = $_POST['title'];
        $description = $_POST['descriptions'];
   

        //$postid = isset($_GET['id'])? $_GET['id'] : '';
        //var_dump($posttitle,$postid);die;

        $query = "UPDATE about SET title='$title', descriptions ='$description' " ;
        $article = new Article();
        $result= $article->editabout($query);
        if($result){
           header('Location: index.php?action=editabout');
     $_SESSION['success'] = "The about info has been sucessfully Updated";
       }
       else{
         header('Location: index.php?action=editabout');
        $_SESSION['error'] = "sorry! there was an error while updating";
    }
}


// else if(isset($_POST['messages'])) 
//     {





// }


else if(isset($_POST['editcontact'])) 
    {

        $title = $_POST['title'];
        $description = $_POST['descriptions'];
   

        //$postid = isset($_GET['id'])? $_GET['id'] : '';
        //var_dump($posttitle,$postid);die;

        $query = "UPDATE about SET title='$title', aboutinfo='$description' " ;
        $article = new Article();
        $result= $article->editabout($query);
        if($result){
           header('Location: index.php?action=editabout');
     $_SESSION['success'] = "The about info has been sucessfully Updated";
       }
       else{
         header('Location: index.php?action=editabout');
        $_SESSION['error'] = "sorry! there was an error while updating";
    }
}




    else if(isset($_POST['register'])) 
    {
        
  if (!filter_var($_POST['username'], FILTER_SANITIZE_STRING)) {
     header('Location: ../index.php?action=register');
    $_SESSION['error'] = "sorry! the Name contains only Characters!";
} 

else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   header('Location: ../index.php?action=register');
        $_SESSION['error'] = "sorry! Please insert the valid email";
}
else{

        $username =  filter_var($_POST['username'], FILTER_SANITIZE_STRING);  
        $password = $_POST['password'];
        $email = $_POST['email'];

        $sql = "INSERT INTO users (username,password,email) VALUES ('$username','$password','$email')";
        $user = new User();
        $result= $user->register($sql);
        if($result){
           header('Location: index.php?action=register');
           $_SESSION['success'] = "Congratulation !You have been registered";
       }       else{
         header('Location: index.php?action=register');
           $_SESSION['success'] = "Sorry! the registration failed";
    }
}
}

else if(isset($_POST['editarticle'])) 
    {

        $posttitle = $_POST['posttitle'];
        $postdescription = $_POST['postdescription'];
        $postcategory =$_POST['postcategory'];
        $postmetatag =$_POST['postmetatag'];

        $postid = isset($_GET['id'])? $_GET['id'] : '';
        //var_dump($posttitle,$postid);die;

        $query = "UPDATE article SET posttitle='$posttitle', postdescription='$postdescription', postcategory='$postcategory',postmetatag='$postmetatag'
         WHERE postid='$postid'     " ;
        $article = new Article();
        $result= $article->editarticle($query);
        if($result){
           header('Location: index.php?action=listpost');
     $_SESSION['success'] = "The Post has been sucessfully Updated";
       }
       else{
         header('Location: index.php?action=editpost');
        $_SESSION['error'] = "sorry! there was an error while updating";
    }
}
 else if (isset($_POST['editprofile'])) {
        $tmp_name = $_FILES["avatar"]["tmp_name"];

        $name = $_FILES["avatar"]["name"];
//var_dump($name);die;
        move_uploaded_file($tmp_name, "uploads/$name");
        $id = $_SESSION['userid'];
        $user = new User();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $query = "update users set username='$username', email='$email', password='$password', pic='$name' where userid= '$id'";

        $result = $user->edituser($query);

        if ($result) {
            $_SESSION['success'] = "Congrats! the profile has been updated sucessfully";
            header('Location: index.php?action=profile');
        }
else{
    $_SESSION['success'] = "sorry! the profile could updated sucessfully";
            header('Location: index.php?action=profile');

}

    }

    else if (isset($_POST['messages']))
{
//$_SESSION['pagetitle'] = 'newarticle';
if (filter_var($_POST['fname'], FILTER_SANITIZE_STRING)) {
    $_SESSION['error'] = "sorry! the fname is not valid";
} 
else if(filter_var($_POST['phoneno'], FILTER_VALIDATE_INT)) {
        $_SESSION['error'] = "sorry! the phone no is not valid";
}

else{

    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING); 
    $phoneno = filter_var($_POST['phoneno'], FILTER_SANITIZE_NUMBER_INT); 
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
    $subject =filter_var($_POST['subject'], FILTER_SANITIZE_STRING);  
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);  
      

    $sql = "INSERT INTO messages (username,email,phoneno,subject,messages)
    VALUES ('$fname','$email','$email','$phoneno','$subject','$message')";

    $article = new Article();
    $result = $article->message($sql);
    if(!empty($result)) 
    {

       header('Location: index.php?action=newpost');
     $_SESSION['success'] = "the message has been sent";
 } 
 else
 {
   $_SESSION['error'] = "There was an error while sending the message";
}

}
}



}











?>      
<?php
ob_end_flush();
?>