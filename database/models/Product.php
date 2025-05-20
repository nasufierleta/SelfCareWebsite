<?php
require_once('Base.php');

class Product extends BaseModel{
    public $title;
    public $description;
    public $price;
    public $stock;
    public $pictureUrl;

    function __construct($id,$title,$description,$price,$stock,$pictureUrl,$createdOn,$updatedOn,$updatedBy){
        parent::__construct($id,$createdOn,$updatedOn,$updatedBy); //fix this

        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->pictureUrl = $pictureUrl;
    }

    function setPicture($picture){
        $this->pictureUrl = $picture;
    }
}
?>