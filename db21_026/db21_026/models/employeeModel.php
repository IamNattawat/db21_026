<?php
class Employee
{
    public $Em_ID;
    public $EmName;

    public function __construct($Em_ID,$EmName)
    {
        $this->Em_ID = $Em_ID;
        $this->EmName = $EmName;
    }

    public static function getAll()
    {
        $employeeList = [];
        require("connection_connect.php");
        $sql = "SELECT * FROM Employee";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $Em_ID = $my_row[Employee_ID];
            $EmName = $my_row[EName];
            $employeeList[] = new Employee($Em_ID,$EmName);
        }
        require("connection_close.php");
        return $employeeList;
    }
}
?>