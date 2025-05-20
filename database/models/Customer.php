<?php
require_once('Base.php');

class Customer extends BaseModel{
    public $name;
    public $surname;
    public $email;
    public $password;
    public $role;
    public $phone;
    public $birthdate;
    public $gender;

    function __construct($id,$name,$surname,$email,$password,$role,$phone,$birthdate,$gender,$created_on,$updated_on,$updated_by){ 
        parent::__construct($id,$created_on,$updated_on,$updated_by);

        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->phone=$phone;
        $this->birthdate=$birthdate;
        $this->gender = $gender;
    }
}
?>