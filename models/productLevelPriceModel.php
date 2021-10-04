<?php

class ProductLevelPrice{
    public $id;
    public $quantity;
    public $price;
    public $productColorTotal;
    public $productID;
    public $productName;

    public function __construct($id,$quantity,$price,$productColorTotal,$productID,$productName)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->productColorTotal = $productColorTotal;
        $this->productID = $productID;
        $this->productName = $productName;
    }

    public static function get($id){
        require("connection_connect.php");
        $sql = "select * from Product_Level_Price , Product where PL_ID = '$id' and plpProduct = Product_ID";
        $result = $conn->query($sql);
        $my_row = $result->fetch_assoc();
        $id = $my_row['PL_ID'];
        $quantity = $my_row['Quantity'];
        $price = $my_row['Price'];
        $productColorTotal = $my_row['P_Color'];
        $productID = $my_row['Product_ID'];
        $productName = $my_row['Name'];
        require("connection_close.php");

        return new ProductLevelPrice($id,$quantity,$price,$productColorTotal,$productID,$productName);
    }

    public static function getAll(){
        $ProductLevelPriceList=[];
        require("connection_connect.php");
        $sql = "SELECT * FROM Product_Level_Price,Product WHERE Product_Level_Price.plpProduct = Product.Product_ID";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $id = $my_row['PL_ID'];
            $quantity = $my_row['Quantity'];
            $price = $my_row['Price'];
            $productColorTotal = $my_row['P_Color'];
            $productID = $my_row['Product_ID'];
            $productName = $my_row['Name'];
            $ProductLevelPriceList[] = new ProductLevelPrice($id,$quantity,$price,$productColorTotal,$productID,$productName);
        }
        require("connection_close.php");

        return $ProductLevelPriceList;
    }

    public static function search($key){
        $ProductLevelPriceList=[];
        require("connection_connect.php");
        $sql = "select * from Product_Level_Price,Product where (PL_ID like '%$key%' or Quantity like '%$key%' or Price like '%$key%' or P_Color like '%$key%' or plpProduct like '%$key%') and plpProduct = product_ID";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $id = $my_row['PL_ID'];
            $quantity = $my_row['Quantity'];
            $price = $my_row['Price'];
            $productColorTotal = $my_row['P_Color'];
            $productID = $my_row['Product_ID'];
            $productName = $my_row['Name'];
            $ProductLevelPriceList[] = new ProductLevelPrice($id,$quantity,$price,$productColorTotal,$productID,$productName);
        }
        require("connection_close.php");

        return $ProductLevelPriceList;
    }

    public static function add($id,$quantity,$price,$totalColor,$product){
        require("connection_connect.php");
        $sql = "insert into Product_Level_Price (PL_ID,Quantity,Price,P_Color,plpProduct) values ('$id','$quantity','$price','$totalColor','$product')";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }
    
    public static function update($id,$quantity,$price,$totalColor,$product){
        require("connection_connect.php");
        $sql = "UPDATE Product_Level_Price SET Quantity = '$quantity',Price = '$price',P_Color = '$totalColor',plpProduct = '$product' WHERE PL_ID = '$id' ";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }
    
    public static function delete($id){
        require_once("connection_connect.php");
        $sql = "Delete from Product_Level_Price Where PL_ID = '$id' ";
        $result = $conn->query($sql);
        require("connection_close.php");
        return "delete success $result row";
    }
}

?>