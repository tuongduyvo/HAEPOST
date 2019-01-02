<?php 
include_once dirname(__FILE__) . "/dbConnect.php";

class SQL_insertMessage{

  public $sql;
  private $stmt;
  private $mysqli;

  public function __construct(){
    $this->sql = <<< EOQ
INSERT INTO message (user_name, message, delete_flg, insert_date)
VALUES (?, ?, 0 , DATE_FORMAT(now(),'%Y%m%d%H%i%S'));
;
EOQ;
  }
  
  public function close(){
    $this->stmt->close();
    $this->mysqli->close();
  }
  
  public function query($username,$message){
    
     $this->mysqli = GetDB_connect();
   if ($this->mysqli->connect_error){
      echo ($this->mysqli->connect_error);
      return null;
   }
    
    if ($this->stmt = $this->mysqli->prepare($this->sql)) {
      $this->stmt->bind_param("ss",$username,$message);
      $this->stmt->execute();
      return $this->stmt;  
    } else {
      echo "create statement failure\r\n";
      return null;
    }
  }
}
 ?>