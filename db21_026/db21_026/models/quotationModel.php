<?php
class Quotation{
    public $C_No;
    public $Date;
    public $Em_ID;
    public $Cus_ID;
    public $EmName;
    public $CusName;
    public $Deposit;
    public $Credit_Day;
    
    public function __construct($C_No,$Date,$Em_ID,$Cus_ID,$EmName,$CusName,$Deposit,$Credit_Day)
    {
        $this->C_No = $C_No;
        $this->Date = $Date;
        $this->Em_ID = $Em_ID;
        $this->Cus_ID = $Cus_ID;
        $this->EmName = $EmName;
        $this->CusName = $CusName;
        $this->Deposit = $Deposit;
        $this->Credit_Day = $Credit_Day;
    }
    
    public static function get($C_No)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM Certificate,Employee,Customer WHERE Certificate.Employee_ID = Employee.Employee_ID AND Certificate.Customer_ID = Customer.Customer_ID AND Certificate.C_No = '$C_No'";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $C_No = $my_row[C_No];
        $Date = $my_row[Date];
        $Em_ID = $my_row[Employee_ID];
        $Cus_ID = $my_row[Customer_ID];
        $EmName = $my_row[EName];
        $CusName = $my_row[Name];
        $Deposit = $my_row[Deposit];
        $Credit_Day = $my_row[Credit_Day];
        require("connection_close.php");
        return new Quotation($C_No,$Date,$Em_ID,$Cus_ID,$EmName,$CusName,$Deposit,$Credit_Day);
    }
    
    public static function getAll()
    {
        $quotationList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Certificate,Employee,Customer WHERE Certificate.Employee_ID = Employee.Employee_ID AND Certificate.Customer_ID = Customer.Customer_ID ORDER BY Certificate.C_No";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $C_No = $my_row[C_No];
            $Date = $my_row[Date];
            $Em_ID = $my_row[Employee_ID];
            $Cus_ID = $my_row[Customer_ID];
            $EmName = $my_row[EName];
            $CusName = $my_row[Name];
            $Deposit = $my_row[Deposit];
            $Credit_Day = $my_row[Credit_Day];
            $quotationList[] = new Quotation($C_No,$Date,$Em_ID,$Cus_ID,$EmName,$CusName,$Deposit,$Credit_Day);
        }
        require("connection_close.php");
        return $quotationList;
    }
    
    public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM Certificate,Employee,Customer 
        WHERE (Certificate.Employee_ID = Employee.Employee_ID AND Certificate.Customer_ID = Customer.Customer_ID) 
        AND (C_No LIKE '%$key%' OR Date LIKE '%$key%' OR Employee.Employee_ID LIKE '%$key%' OR Customer.Customer_ID LIKE '%$key%' 
        OR Employee.EName LIKE '%$key%' OR Customer.Name LIKE '%$key%' OR Deposit LIKE '%$key%' OR Credit_Day LIKE '%$key%')";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $C_No = $my_row[C_No];
            $Date = $my_row[Date];
            $Em_ID = $my_row[Employee_ID];
            $Cus_ID = $my_row[Customer_ID];
            $EmName = $my_row[EName];
            $CusName = $my_row[Name];
            $Deposit = $my_row[Deposit];
            $Credit_Day = $my_row[Credit_Day];
            $quotationList[] = new Quotation($C_No,$Date,$Em_ID,$Cus_ID,$EmName,$CusName,$Deposit,$Credit_Day);
        }
        require("connection_close.php");

        return $quotationList;
    }
    
    public static function add($C_No,$Date,$Em_ID,$Cus_ID,$Deposit,$Credit_Day)
    {
        require("connection_connect.php");
        $sql = "INSERT INTO `Certificate` (`C_No`, Date, `Employee_ID`, `Customer_ID`, `Deposit`, `Credit_Day`) 
        VALUES ('$C_No','$Date', '$Em_ID', '$Cus_ID', '$Deposit', '$Credit_Day');";
        $result = $conn->query($sql);
        if($result === TRUE){
            echo "Add success ".$result." row <br>";
        }
        else
        {
            echo "Error: ".$sql."<br>".$conn->error."<br>";
        }
        require("connection_close.php");
    }

    public static function update($C_No,$Date,$Em_ID,$Cus_ID,$Deposit,$Credit_Day)
    {
        require("connection_connect.php");
        $sql = "UPDATE Certificate SET C_No = '$C_No', Date = '$Date', Employee_ID = '$Em_ID',
        Customer_ID = '$Cus_ID', Deposit = '$Deposit', Credit_Day = '$Credit_Day' WHERE C_No = '$C_No'";
        $result = $conn->query($sql);
        if($result === TRUE){
            echo "update success $result row <br>";
        }
        else
        {
            echo "Error: ".$sql."<br>".$conn->error."<br>";
        }
        require("connection_close.php");
    }

    public static function delete($C_No)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM Certificate WHERE C_No = '$C_No'";
        $result = $conn->query($sql);
        if($result === TRUE){
            echo "delete success $result row <br>";
        }
        else
        {
            echo "Error: ".$sql."<br>".$conn->error."<br>";
        }
        require("connection_close.php");
    }
}
?>