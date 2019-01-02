<?php
include_once dirname(__FILE__) . "/../model/SQL_deleteMessage.php";

$SQL_deleteMessage = new SQL_deleteMessage();
$stmt = $SQL_deleteMessage->query($_POST['id']);
$SQL_deleteMessage->close();
return;
      
?>
