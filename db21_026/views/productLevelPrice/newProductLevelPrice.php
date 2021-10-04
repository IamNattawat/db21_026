<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label>รหัส<input type="text" name="id"></label><br>
        <label>จำนวน</label><input type="text" name="quantity"></label><br>
        <label>ราคา<input type="text" name="price"></label><br>
        <label>จำนวนสี<input type="text" name="totalColor"></label>
        <label>สินค้า<select name="product">
            <?php 
            foreach($product_list as $product){
                echo "<option value=$product->id>$product->name</option>";
            }
            ?>
        </select></label><br>
        <input type="hidden" name="controller" value="productLevelPrice">
        <button type="submit" name="action" value="index"> Back </button>
        <button type="submit" name="action" value="addProductLevelPrice"> Save </button>
    </form>
</body>
</html>