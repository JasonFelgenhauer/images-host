<?php
require_once 'views/View.php';

class ControllerHome{
    private $_view;

    public function __construct($url){
        if(isset($url) && count($url) > 1){
            throw new Exception('Page introuvable');
        }else{
            $this->home();
        }
    }

    private function home(){
        $this->_view = new View('Home');
        $this->_view->generate(array('home' => null));
    }
}