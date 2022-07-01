<?php
class ControllerLogin extends Model {
    private $_model;
    private $_view;

    /**
     * @throws Exception
     */
    public function __construct($url){
        if(isset($url) && count($url) > 2){
            throw new Exception('Page not found');
        }else{
            $this->login($url);
        }
    }

    private function login($url){
        if(isset($url[1])){
            if($url[1] === 'logout'){
                unset($_SESSION['connect']);
                header('Location: /home');
            }else{
                throw new Exception('Page not found');
            }
        }else{
            $this->checkConnection('home');

            $this->_model = new Login();

            $this->_view = new View('Login');
            $this->_view->generate(array(null));
        }
    }
}