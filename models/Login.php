<?php
class Login extends Model{
    private $_users;

    public function __construct(){
//        if($_GET['logout']){
//            echo 'ok';
//        }
        if(!empty($_POST['login_email']) && !empty($_POST['login_password'])){
            $email = $this->validate('email', $_POST['login_email'], 'email');
            $password = $this->validate('password', $_POST['login_password'], 'password');

            $user = $this->checkExist('users', 'email', $email)[0];
            $password = '4FYH9' . $password . '2f0h0';
            $password = password_hash($password, PASSWORD_ARGON2I);

            if($user['exist'] != 1){
                return $_SESSION['errors']['exist'] = 'Unable to connect';
            }

            $this->_users = new UsersManager();
            $user = $this->_users->getUser('email', $email);

            if(password_verify($password, $user[0]->password())){
                return $_SESSION['errors']['badPass'] = 'Unable to connect';
            }

            if(!isset($_SESSION['errors'])){
                $_SESSION['connect'] = 1;
                $_SESSION['id'] = $user[0]->id();

                header('Location: /home');
            }
        }
    }
}