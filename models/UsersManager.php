<?php
class UsersManager extends Model{
    public function getUser($key, $value){
        return $this->getRow('users', $key ,$value, 'User');
    }
}