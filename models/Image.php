<?php

class Image extends Model {
    private $_id;
    private $_image_url;
    private $_user_id;

    public function __construct($data){
        $this->hydrate($data);
    }

    private function hydrate($data){
        foreach($data as $key => $value){
            $method = 'set' . ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId($id){
        $this->_id = $this->validate('id', $id);
    }
    public function setImage_url($url){
        $this->_image_url = $url;
    }
    public function setUser_id($id){
        $this->_user_id = $this->validate('id', $id);
    }

    public function id(){
        return $this->_id;
    }
    public function image_url(){
        return $this->_image_url;
    }
    public function user_id(){
        return $this->_user_id;
    }
}