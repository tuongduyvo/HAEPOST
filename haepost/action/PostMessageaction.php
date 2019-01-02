<?php
include_once dirname(__FILE__) . "/../model/SQL_insertMessage.php";

$SQL_insertMessage = new SQL_insertMessage();
$stmt = $SQL_insertMessage->query($_POST['username'],$_POST['message']);
$SQL_insertMessage->close();
return;
?>
