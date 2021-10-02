<?php
class Customer
{
    public $Cus_ID;
    public $CusName;

    public function __construct($Cus_ID,$CusName)
    {
        $this->Cus_ID = $Cus_ID;
        $this->CusName = $CusName;
    }

    public static function getAll()
    {
        $customerList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Customer";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $Cus_ID = $my_row[Customer_ID];
            $CusName = $my_row[Name];
            $customerList[] = new Customer($Cus_ID,$CusName);
        }
        require("connection_close.php");
        return $customerList;
    }
}
?>