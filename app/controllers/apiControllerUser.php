<?php

include_once './app/models/user_model.php';
include_once './app/views/apiViewer.php';

class apiControllerUser{

    private $model;
    private $view;
    private $authHelper;

    function __construct(){
        $this->model = new userModel();
        $this->view = new apiViewer();
        $this->authHelper = new apiHelper();
    }

    function getToken($params = null) {
        $userpass = $this->authHelper->getBasic();
        if(isset($userpass)){
            $pass = implode(array("pass"=>$userpass["pass"]));
    
            $hash = password_hash($pass, PASSWORD_DEFAULT);
    
            $user = $this->model->getUser($userpass["user"]);
    
            if ($user && password_verify($user[0]->password, $hash)) {
                $token = $this->authHelper->createToken($user);
                $this->view->response(["token"=>$token], 200);
            
            }else{
                $this->view->response("Usuario y contraseña incorrectos", 401);
            }
        } else {
            $this->view->response("Hace falta ingresar email y contraseña", 400);
        }
            
    }

}
