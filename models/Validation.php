<?php
class Validation{
    public function checkEmail($email, $error){
        unset($_SESSION['errors']['email'][$error]);

        if(preg_match('/^\w+@\w+.\w{2,}$/', $email)){
            return htmlspecialchars($email);
        }else{
            $_SESSION['errors']['email'][$error] = 'This field can only contain a valid email address';
        }
    }

    public function checkPassword($password, $error){
        unset($_SESSION['errors']['password'][$error]);

        if(preg_match('/^.{8,}$/', $password)){
            if(preg_match('/[A-Z]+/', $password)){
                if(preg_match('/\d+/', $password)){
                    return htmlspecialchars($password);
                }else{
                    $_SESSION['errors']['password'][$error] = 'Your password must contain at least one number';
                }
            }else{
                $_SESSION['errors']['password'][$error] = 'Your password must have at least one capital letter';
            }
        }else{
            $_SESSION['errors']['password'][$error] = 'Your password must be at least 8 characters long';
        }
    }

    public function checkId($id, $error){
        unset($_SESSION['errors']['id'][$error]);

        if(preg_match('/^\d{0,11}$/', $id)){
            return $id;
        }else{
            $_SESSION['errors']['id'][$error] = 'ID can only contain numbers (max 11)';
        }
    }
}