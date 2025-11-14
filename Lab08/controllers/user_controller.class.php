<?php
/**
 * Author: Benjamin Egger-Torke
 * Date: 11/13/25
 * File: user_controller.class.php
 * Description:
 **/

class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $view = new Index();
        $view->display();
    }

    public function register()
    {
        $data = $this->userModel->add_user();
        $view = new Register();
        $view->display($data);

    }

    public function login()
    {
        $view = new Login();
        $view->display();
    }

    public function verify()
    {
        $user = $this->userModel->verify_user();

        $view= new VerifyUser();
        $view->display($user,$_COOKIE["username"]);
    }

    public function logout()
    {
        $logout= $this->userModel->logout();

        $view = new Logout();
        $view->display($logout);
    }

    public function reset()
    {
        $view = new Reset();
        $view->display();
    }

    public function do_reset()
    {
        $result = $this->userModel->reset_password();
        $view = new ResetConfirm;
        $view->display($result);
    }

    public function error($message)
    {
        $view = new Error();
        $view->display($message);
    }
}
