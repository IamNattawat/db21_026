<?php
    class Quotationlist{
        public $cl_no;
        public $quantity;
        public $color_print;
        public $pc_id;
        public $colorname;
        public $c_no;

        public function __construct($cl_no,$quantity,$color_print,$pc_id,$colorname,$c_no)
        {
            $this->cl_no = $cl_no;
            $this->quantity = $quantity;
            $this->color_print = $color_print;
            $this->pc_id = $pc_id;
            $this->colorname = $colorname;
            $this->c_no = $c_no;
        }

        public static function getAll()
        {
            $quotationList_list = [];
            require("connection_connect.php");
            $sql = "SELECT * FROM Certificate_list,Product_Color WHERE Certificate_list.PC_ID = Product_Color.PC_ID";
            $result = $conn->query($sql);
            while($my_row = $result->fetch_assoc())
            {
                $cl_no = $my_row[CL_No];
                $quantity = $my_row[Quantity];
                $color_print = $my_row[Color_Print];
                $pc_id = $my_row[PC_ID];
                $colorname = $my_row[ColorName];
                $c_no = $my_row[C_No];
                $quotationList_list[] = new Quotationlist($cl_no,$quantity,$color_print,$pc_id,$colorname,$c_no);
            }
            require("connection_close.php");
            return $quotationList_list;
        }

        public static function add($CL_No,$Quantity,$Color_Print,$PC_ID,$C_No)
        {
            require("connection_connect.php");
            $sql = "INSERT INTO `Certificate_list` (`CL_No`, `Quantity`, `Color_Print`, `PC_ID`, `C_No`) 
            VALUES ('$CL_No','$Quantity', '$Color_Print', '$PC_ID', '$C_No')";
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

        public static function search($key)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM Certificate_list,Product_Color
        WHERE Certificate_list.PC_ID = Product_Color.PC_ID
        AND (Certificate_list.CL_No LIKE '%$key%' OR Certificate_list.Quantity LIKE '%$key%' OR Certificate_list.Color_Print LIKE '%$key%' OR Certificate_list.PC_ID LIKE '%$key%' OR 
        Product_Color.ColorName LIKE '%$key%' OR Certificate_list.C_No LIKE '%$key%')";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc())
        {
            $cl_no = $my_row['CL_No'];
            $quantity = $my_row['Quantity'];
            $color_print = $my_row['Color_Print'];
            $pc_id = $my_row['PC_ID'];
            $colorname = $my_row['ColorName'];
            $c_no = $my_row['C_No'];
            $quotationList_list[] = new Quotationlist($cl_no,$quantity,$color_print,$pc_id,$colorname,$c_no);
        }
        require("connection_close.php");
        return $quotationList_list;
    }

    public static function get($CL_No)
    {
        require("connection_connect.php");
        $sql = "SELECT * FROM Certificate_list,Product_Color WHERE Certificate_list.PC_ID = Product_Color.PC_ID AND Certificate_list.CL_No = '$CL_No'";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $cl_no = $my_row['CL_No'];
        $quantity = $my_row['Quantity'];
        $color_print = $my_row['Color_Print'];
        $pc_id = $my_row['PC_ID'];
        $colorname = $my_row['ColorName'];
        $c_no = $my_row['C_No'];
        require("connection_close.php");
        return new Quotationlist($cl_no,$quantity,$color_print,$pc_id,$colorname,$c_no);
    }

    public static function update($aCL_No,$bCL_No,$Quantity,$Color_Print,$PC_ID,$C_No)
    {
        require("connection_connect.php");
        $sql = "UPDATE Certificate_list SET CL_No = '$aCL_No', Quantity = '$Quantity', Color_Print = '$Color_Print', PC_ID = '$PC_ID', C_No = '$C_No' WHERE CL_No = '$bCL_No'";
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

    public static function delete($CL_No)
    {
        require("connection_connect.php");
        $sql = "DELETE FROM Certificate_list WHERE CL_No = '$CL_No'";
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