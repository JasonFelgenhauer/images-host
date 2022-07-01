<?php

class ImagesManager extends Model{
    public function getImages($key, $value){
        return $this->getRows('images', $key, $value, 'Image');
    }
    public function getImage($key, $value){
        return $this->getRow('images', $key, $value, 'Image');
    }
}