<?php 
include_once dirname(__FILE__) . "/dbConnect.php";

class SQL_deleteMessage{

  public $sql;
  private $stmt;
  private $mysqli;

  public function __construct(){
    $this->sql = <<< EOQ
UPDATE message SET delete_flg=1 WHERE id=?;
;
EOQ;
  }
  
  public function close(){
    $this->stmt->close();
    $this->mysqli->close();
  }
  
  public function query($id){
    
     $this->mysqli = GetDB_connect();
   if ($this->mysqli->connect_error){
      echo ($this->mysqli->connect_error);
      return null;
   }
    
    if ($this->stmt = $this->mysqli->prepare($this->sql)) {
      $this->stmt->bind_param("i",$id);
      $this->stmt->execute();
      return $this->stmt;  
    } else {
      echo "create statement failure\r\n";
      return null;
    }
  }
}
 ?>