<?php
$action_name=basename(__FILE__);
include_once dirname(__FILE__) . "/../model/SQL_getMessage.php";
include_once dirname(__FILE__) . "/../view/DTO/ViewDTO_dashboard.php";


$SQL_getMessage = new SQL_getMessage();
$ViewDTO_dashboard = new ViewDTO_dashboard();

$stmt = $SQL_getMessage->query();
$message_array=array();
  if($stmt != null){
    $stmt->bind_result($id,$user_name,$message);
    $i= 0;
    while ($stmt->fetch()) {
      $message_array[$i]['user_name']=$user_name;
      $message_array[$i]['message']=$message;
      $i++;
    }
    $SQL_getMessage->close();
  }
  //set data to DTO (data transfer object)
  $ViewDTO_dashboard->message_array=$message_array;
  $ViewDTO_dashboard ->view();

?>