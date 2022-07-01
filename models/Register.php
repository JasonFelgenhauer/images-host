<?php
class Register extends Model{
    public function __construct(){
        if(!empty($_POST['register_email']) && !empty($_POST['register_password']) && !empty($_POST['register_password_confirm'])){
            unset($_SESSION['errors']);

            $email = $this->validate('email', $_POST['register_email'], 'email');
            $password = $this->validate('password', $_POST['register_password'], 'password');
            $confirm_password = $this->validate('password', $_POST['register_password_confirm'], 'confirm');
            $user = $this->checkExist('users', 'email', $email)[0];

            $password = '4FYH9' . $password . '2f0h0';
            $password = password_hash($password, PASSWORD_ARGON2I);

            if($user['exist'] != 0){
                return $_SESSION['errors']['exist'] = 'Email address already used';
            }

            if(!isset($_SESSION['errors'])){
                $this->create('users', [$email, $password], ['email', 'password']);
                header('Location: /login');
            }
        }
    }
}