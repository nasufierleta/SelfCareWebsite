<?php

class OrderProduct{
    public $id;
    public $title;
    public $price;
    public $quantity;
    public $pictureUrl;

    function __construct($id,$title,$price,$quantity,$pictureUrl){
        $this->id=$id;
        $this->title=$title;
        $this->price=$price;
        $this->quantity=$quantity;
        $this->pictureUrl = $pictureUrl;
    }
}

?>