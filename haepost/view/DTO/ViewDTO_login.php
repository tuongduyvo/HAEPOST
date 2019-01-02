<?php
class ViewDTO_login{

    public $error = NULL;
    public function view(){
        $DTO=$this;
        include_once dirname(__FILE__)."/../pages/login.php";
    }
}

?>