    <?php
// class used to perform all the database related queries and task
class db{
protected static $connection;

public function connect(){
	
$dbhost = 'localhost'; //mysql.hostinger.co.uk
$dbuser = 'root'; //u956652776_nikes
$dbpassword = 'root';
$db = 'u956652776_blog';

$conn = new mysqli($dbhost,$dbuser,$dbpassword,$db);
return $conn;

}


public function query($query){

	$connection = $this->connect();

	$result = $connection->query($query);

	return $result;
}


public function select($query){

	$rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

        
    

 public function error() {
        $connection = $this->connect();
        return $connection->error;
    }


}

?>