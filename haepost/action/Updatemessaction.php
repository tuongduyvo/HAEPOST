<?php
include_once dirname(__FILE__) . "/../model/SQL_updateMessage.php";
include_once dirname(__FILE__) . "/../view/DTO/ViewDTO_dashboardAdmin.php";
include_once dirname(__FILE__) . "/../model/SQL_getMessage.php";

$ViewDTO_dashboardAdmin = new ViewDTO_dashboardAdmin();
$SQL_getMessage = new SQL_getMessage();
$SQL_updateMessage = new SQL_updateMessage();
$stmt = $SQL_updateMessage->query($_POST['id'],$_POST['content']);
$SQL_updateMessage->close();
$stmt = $SQL_getMessage->query();
$message_array=array();
 if($stmt != null){
   	$stmt->bind_result($id,$user_name,$message);
    $i= 0;
    while ($stmt->fetch()) {
        $message_array[$i]['id']=$id;
      	$message_array[$i]['user_name']=$user_name;
      	$message_array[$i]['message']=$message;
      	$i++;
    	}
    	$SQL_getMessage->close();
  		}
  	$ViewDTO_dashboardAdmin->message_array=$message_array;
  	$ViewDTO_dashboardAdmin ->view();
      
?>
