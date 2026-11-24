<?php 
require_once 'helpers/flash.php';
require_once 'Models/auth.php';

class authcontroller{
    public function registerform(){
        $error = flash::get('error');
        include 'views/Auth/register.php';
    }

    public function register(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            flash::set('error','Username or password cannot be empty');
            header("Location: index.php?action=registerform");
            exit();
        }
        if(auth::checkusername($username)){
            flash::set('error','Username is already in use');
            header("Location: index.php?action=registerform");
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        auth::register($username, $hashed_password);
        flash::set('success', 'Registration Successfully');
        header("Location: index.php?action=index");
        exit();
    }

    public function index(){
        $error = flash::get('error');
        $success = flash::get('success');
        include 'views/Auth/index.php';
    }

    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = auth::login($username);

        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['username'] = $user['username'];
            flash::set('success', 'Login Successfully');
            header("Location: index.php?action=dashboard");
            exit();
        } else{
            flash::set('error', 'Invalid username or password');
            header("Location: index.php?action=index");
            exit();
        }

    }

    public function logout(){
        session_start();
        session_destroy();
        header("Location: index.php?action=index");
        exit();
    }
}

?>