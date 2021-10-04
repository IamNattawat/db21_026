<?php 

class ProductLevelPriceController{
    public function index(){
        $productLevelPrice_list = productLevelPrice::getAll();
        require_once('views/productLevelPrice/index_productLevelPrice.php');
    }

    public function newProductLevelPrice(){
        $product_list = Product::getAll();
        require_once('views/productLevelPrice/newProductLevelPrice.php');
    }

    public function addProductLevelPrice(){
        $id = $_GET['id'];
        $quantity = $_GET['quantity'];
        $price = $_GET['price'];
        $totalColor = $_GET['totalColor'];
        $product = $_GET['product'];
        ProductLevelPrice::add($id,$quantity,$price,$totalColor,$product);
        ProductLevelPriceController::index();
    }
    
    public function search(){
        $key = $_GET['key'];
        $productLevelPrice_list = ProductLevelPrice::search($key);
        require_once('views/productLevelPrice/index_productLevelPrice.php');
    }
    
    public function updateForm(){
        $id = $_GET['PL_ID'];
        $productLevelPrice=ProductLevelPrice::get($id);
        $product_list = Product::getAll();
        require_once('views/productLevelPrice/updateForm.php');
    }
    
    public function update(){
        $id = $_GET['id'];
        $quantity = $_GET['quantity'];
        $price = $_GET['price'];
        $totalColor = $_GET['totalColor'];
        $product = $_GET['product'];
        ProductLevelPrice::update($id,$quantity,$price,$totalColor,$product);
        ProductLevelPriceController::index();
    }

    public function deleteConfirm(){
        $id = $_GET['PL_ID'];
        $productLevelPrice=ProductLevelPrice::get($id);
        require_once('views/productLevelPrice/deleteConfirm.php');
    }

    public function delete(){
        $id = $_GET['PL_ID'];
        ProductLevelPrice::delete($id);
        ProductLevelPriceController::index();
    }
}

?>