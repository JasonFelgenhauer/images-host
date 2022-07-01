<?php
class ControllerAccount extends Model{
    private $_images;
    private $_model;
    private $_view;

    /**
     * @throws Exception
     */
    public function __construct($url){
        if(isset($url) && count($url) > 3){
            throw new Exception('Page not found');
        }else{
            $this->account($url);
        }
    }

    private function account($url){
        $this->requireConnection('home');

        $this->_images = new ImagesManager();
        $images = $this->_images->getImages('user_id', $_SESSION['id']);

        $this->_model = new Account($url);

        $this->_view = new View('Account');
        $this->_view->generate(array('images' => $images));
    }
}