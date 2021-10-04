<?php 

class Product {

    public $id, $name;
    public function __construct($id , $name){
        $this->id = $id;
        $this->name = $name;
    }
    public static function getAll(){
        $product_List = [];
        require("connection_connect.php");
        $sql = "select * from Product";
        $result = $conn->query($sql);
        while($my_row = $result->fetch_assoc()){
            $productID = $my_row['Product_ID'];
            $productName = $my_row['Name'];
            $product_List[] = new product($productID,$productName);
        }
        require("connection_close.php");
        return $product_List;
    }

}

?>