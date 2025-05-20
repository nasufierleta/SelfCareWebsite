<?php

class BaseModel{
    public $id;
    public $created_on;
    public $updated_on;
    public $updated_by;

    function __construct($id,$created_on,$updated_on,$updated_by){
        $this->id = $id;
        $this->created_on = $created_on;
        $this->updated_on = $updated_on;
        $this->updated_by = $updated_by;
    }
}

?>
