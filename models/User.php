<?php
class User extends Model{
    private $_id;
    private $_email;
    private $_password;

    public function __construct($data){
        $this->hydrate($data);
    }

    private function hydrate($data){
        foreach ($data as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->_id = $this->validate('id', $id);
    }
    public function setEmail($email){
        $this->_email = $this->validate('email', $email);
    }
    public function setPassword($password){
        $this->_password = $password;
    }

    public function id(){
        return $this->_id;
    }
    public function email(){
        return $this->_email;
    }
    public function password(){
        return $this->_password;
    }
}