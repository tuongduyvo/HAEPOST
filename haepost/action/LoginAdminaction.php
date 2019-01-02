<?php
include_once dirname(__FILE__) . "/../model/SQL_getAdmin.php";
include_once dirname(__FILE__) . "/../view/DTO/ViewDTO_dashboardAdmin.php";
include_once dirname(__FILE__) . "/../view/DTO/ViewDTO_login.php";
include_once dirname(__FILE__) . "/../model/SQL_getMessage.php";


$SQL_getAdmin = new SQL_getAdmin();
$ViewDTO_login = new ViewDTO_login();
$ViewDTO_dashboardAdmin = new ViewDTO_dashboardAdmin();
$SQL_getMessage = new SQL_getMessage();
if(!empty($_POST)){
	$stmt = $SQL_getAdmin->query($_POST['username']);
  	if($stmt != null){
    $stmt->bind_result($user_name,$password);
    while ($stmt->fetch()) {
      if ($_POST['username'] == $user_name && $password == $_POST['pwd']){
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
      }else{
      	$ViewDTO_login->error="Password was wrong, please try again";
  		$ViewDTO_login->view();
      }
    }
    $SQL_getAdmin->close();
  }else{
  	$ViewDTO_login->error="Username was wrong, please try again";
  	$ViewDTO_login->view();
  }
}else{
	$ViewDTO_login->view();
}
?>