<?php 
include_once dirname(__FILE__) . "/dbConnect.php";

class SQL_getMessage{

  public $sql;
  private $stmt;
  private $mysqli;

  public function __construct(){
    $this->sql = <<< EOQ
SELECT
  id
  ,user_name
  ,message
FROM
  message
WHERE
   delete_flg=0
ORDER BY insert_date DESC
;
EOQ;
  }
  
  public function close(){
    $this->stmt->close();
    $this->mysqli->close();
  }
  
  public function query(){
    
     $this->mysqli = GetDB_connect();
   if ($this->mysqli->connect_error){
      echo ($this->mysqli->connect_error);
      return null;
   }
    
    if ($this->stmt = $this->mysqli->prepare($this->sql)) {
      $this->stmt->execute();
      return $this->stmt;  
    } else {
      echo "create statement failure\r\n";
      return null;
    }
  }
}
 ?>