<?php 
include_once dirname(__FILE__) . "/dbConnect.php";

class SQL_getAdmin{

  public $sql;
  private $stmt;
  private $mysqli;

  public function __construct(){
    $this->sql = <<< EOQ
SELECT
  user_name
  ,password
FROM
  user
WHERE
   user_name=?
   AND role=1
;
EOQ;
  }
  
  public function close(){
    $this->stmt->close();
    $this->mysqli->close();
  }
  
  public function query($username){
    
     $this->mysqli = GetDB_connect();
   if ($this->mysqli->connect_error){
      echo ($this->mysqli->connect_error);
      return null;
   }
    
    if ($this->stmt = $this->mysqli->prepare($this->sql)) {
      $this->stmt->bind_param("s",$username);
      $this->stmt->execute();
      return $this->stmt;  
    } else {
      echo "create statement failure\r\n";
      return null;
    }
  }
}
 ?>