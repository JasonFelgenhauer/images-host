<?php

class Account extends Model{
    private $_image;

    public function __construct($url){
        if(isset($url[1]) && $url[1] == 'delete'){
            $exist = $this->checkExist('images', 'id', $url[2]);
            if($exist['exist'] == 0){
                header('Location: /account');
            }

            $this->_image = new ImagesManager();
            $image = $this->_image->getImage('id', $url[2])[0];

            if($image->user_id() != $_SESSION['id']){
                header('Location: /account');
            }

            if(file_exists($image->image_url())){
                unlink($image->image_url());
                $this->delete('images', 'id', $image->id());
                header('Location: /account');
            }
        }
    }
}