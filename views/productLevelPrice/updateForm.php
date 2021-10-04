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
    <label>รหัส<input type="text" name="id" value="<?php echo $productLevelPrice->id; ?>"></label><br>
        <label>ชื่อ<input type="text" name="quantity" value="<?php echo $productLevelPrice->quantity; ?>"></label><br>
        <label>รหัส<input type="text" name="price" value="<?php echo $productLevelPrice->price; ?>"></label><br>
        <label>รหัส<input type="text" name="totalColor" value="<?php echo $productLevelPrice->productColorTotal; ?>"></label><br>
        <label>ภาควิชา<select name="product">
            <?php 
            foreach($product_list as $pro){
                echo "<option value=$pro->id";
                if($pro->id==$productLevelPrice->productID){echo " selected='selected' ";}
                echo ">$pro->name</option>";
            }
            ?>
        </select></label><br>
        <input type="hidden" name="controller" value="productLevelPrice">
        <button type="submit" name="action" value="index"> Back </button>
        <button type="submit" name="action" value="update"> Update </button>
    </form>
</body>
</html>