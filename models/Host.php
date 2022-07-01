<?php
class Host extends Model{
    public function __construct(){
        if(isset($_FILES['file_input'])){
            $imageInformation = pathinfo($_FILES['file_input']['name']);
            $imageExtension = $imageInformation['extension'];
            $extensionArray = array('png', 'gif', 'jpg', 'jpeg', 'ico');
            if(isset($_SESSION['connect'])){
                if(in_array($imageExtension, $extensionArray)){
                    $url = './uploads/' . time().basename($_FILES['file_input']['name']);
                    move_uploaded_file($_FILES['file_input']['tmp_name'], $url);

                    $this->create('images', [$url, $_SESSION['id']], ['image_url', 'user_id']);
                    header('Location: ' . $url);
                }
            }else{

                if(in_array($imageExtension, $extensionArray)){
                    $url = './uploads/' . time().basename($_FILES['file_input']['name']);
                    move_uploaded_file($_FILES['file_input']['tmp_name'], $url);

                    $this->create('images', [$url], ['image_url']);
                    header('Location: ' . $url);
                }
            }
        }
    }
}