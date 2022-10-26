<?php
require_once './app/views/user_view.php';
require_once './app/views/review_view.php';
require_once './app/models/user_model.php';
require_once './app/controllers/helper.php';

class userController {

    public function __construct() {
        $this->view = new userView;
        $this->model = new userModel;
        $this->reviewView = new ReviewView;
        $this->helper = new helper;

    }

    public function showLogin() {
        $bool = $this->helper->booleanLog();
        $this->view->showLogin($bool);
    }

    public function validarUsuario() {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hash = password_hash($password, PASSWORD_DEFAULT); //hashear en bd
        $usuario = $this->model->getUserByEmail($email);

        if (!empty($usuario) && password_verify($usuario[0]->password, $hash)) {

            session_start();
            $_SESSION['USER_ID'] = $usuario->id;
            $_SESSION['USER_EMAIL'] = $usuario->email;
            $_SESSION['IS_LOGGED'] = true;

            var_dump($usuario);
            header("Location: " . BASE_URL);

        } else {
            $this->reviewView->error("EL USUARIO O LA CONTRASEÑA SON INCORRECTOS");
        } 
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "login");
    }

}