<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

    echo "<br>Are you sure to delete this Product Level Price <br>
            <br> $productLevelPrice->id <br>"
    ?> 
    <form action="" method="get">
        <input type="hidden" name="controller" value="productLevelPrice">
        <input type="hidden" name="PL_ID" value="<?php echo $productLevelPrice->id; ?>">
        <button type="submit" name="action" value="index"> Back </button>
        <button type="submit" name="action" value="delete"> Delete </button>
    </form>
</body>
</html>