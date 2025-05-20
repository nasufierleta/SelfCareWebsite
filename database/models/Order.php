<?php
require_once('Base.php');

class Order extends BaseModel{
    public $id;
    public $customerId;
    public $deliveryAddress;
    public $totalPrice;
    public $isPaid;

    function __construct($id,$customerId,$deliveryAddress,$totalPrice,$isPaid,$createdOn,$updatedOn,$updatedBy){
        parent::__construct($id,$createdOn,$updatedOn,$updatedBy);

        $this->customerId = $customerId;
        $this->deliveryAddress = $deliveryAddress;
        $this->totalPrice = $totalPrice;
        $this->isPaid = $isPaid;
    }
}
?>