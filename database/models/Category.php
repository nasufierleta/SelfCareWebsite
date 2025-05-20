<?php
require_once('Base.php');

class Category extends BaseModel{
    public $name;
    public $description;
    public $pictureUrl;

    function __construct($id,$name,$description,$pictureUrl,$created_on,$updated_on,$updated_by){
        parent::__construct($id,$created_on,$updated_on,$updated_by);

        $this->name=$name;
        $this->description=$description;
        $this->pictureUrl=$pictureUrl;
    }
}
?>