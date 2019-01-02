<?php
class ViewDTO_dashboardAdmin{

    public $message_array = array();
    public function view(){
        $DTO=$this;
        include_once dirname(__FILE__)."/../pages/dashboardAdmin.php";
    }
}

?>