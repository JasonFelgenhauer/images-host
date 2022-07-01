<?php
class ControllerRegister extends Model{
    private $_model;
    private $_view;

    /**
     * @throws Exception
     */
    public function __construct($url){
        if(isset($url) && count($url) > 1){
            throw new Exception('Page not found');
        }else{
            $this->register();
        }
    }

    private function register(){
        $this->checkConnection('home');

        $this->_model = new Register();

        $this->_view = new View('Register');
        $this->_view->generate(array(null));
    }
}