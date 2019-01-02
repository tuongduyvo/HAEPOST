<?php 
include_once dirname(__FILE__) . "/dbConnect.php";

class SQL_updateMessage{

  public $sql;
  private $stmt;
  private $mysqli;

  public function __construct(){
    $this->sql = <<< EOQ
UPDATE message SET message=? WHERE id=?;
;
EOQ;
  }
  
  public function close(){
    $this->stmt->close();
    $this->mysqli->close();
  }
  
  public function query($id,$content){
    
     $this->mysqli = GetDB_connect();
   if ($this->mysqli->connect_error){
      echo ($this->mysqli->connect_error);
      return null;
   }
    
    if ($this->stmt = $this->mysqli->prepare($this->sql)) {
      $this->stmt->bind_param("si",$content,$id);
      $this->stmt->execute();
      return $this->stmt;  
    } else {
      echo "create statement failure\r\n";
      return null;
    }
  }
}
 ?>