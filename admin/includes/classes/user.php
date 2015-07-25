<?php

class User {

  

    public function register($query) {
        $db = new db();

        $result = $db->query($query);

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }

    public function login($query) {
       //  include 'db.php';
        $db = new db();

        $result = $db->select($query);
       
                return $result;
        
    }

    public function listuser($query)
    {
       

         $db = new db();
          $query = "select * from users";

        $result = $db->select($query);

        return $result;

        
      
    }
 public function edit($id) {
        $db = new db();
        $query = "select * from users where userid = '$id'";
        $result = $db->select($query);
        //var_dump($result);die;
        return $result;
    }
public function edituser($query) {
        $db = new db();

        $result = $db->query($query);

        if ($result === true) {
            return true;
        } else {
            return false;
        }
    }
    
}

?>