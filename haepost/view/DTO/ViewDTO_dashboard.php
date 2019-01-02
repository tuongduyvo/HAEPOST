<?php
class ViewDTO_dashboard{

    public $message_array = array();
    public function view(){
        $DTO=$this;
        include_once dirname(__FILE__)."/../pages/dashboard.php";
    }
}

?>