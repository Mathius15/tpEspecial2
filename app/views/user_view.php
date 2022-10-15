<?php

require_once 'D:\xampp\htdocs\WEB2\TP_ESPECIAL_WEB\libs\smarty-4.2.1\libs\Smarty.class.php';
class userView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function showLogin(){
        $this->smarty->assign('tituloPag',"Login");
        $this->smarty->display('login.tpl');
    }

    function errorUser() {
        $this->smarty->assign('tituloPag',"ERROR");
        $this->smarty->display('errorAdmin.tpl');
    }
}