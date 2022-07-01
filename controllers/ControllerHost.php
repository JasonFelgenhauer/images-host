<?php
class ControllerHost extends Model{
    private $_model;
    private $_view;

    public function __construct($url){
        if(isset($url) && count($url) > 1){
            throw new Exception('Page not found');
        }else{
            $this->host();
        }
    }

    private function host(){
        $this->_model = new Host();

        $this->_view = new View('Host');
        $this->_view->generate(array(null));
    }
}