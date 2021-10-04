
    <h1>PERADONE CHEMMOOKDA 6220500687</h1>
    new productLevelPrice <a href="?controller=productLevelPrice&action=newProductLevelPrice"> click </a> <br>
    <form action="" method="get">
        <input type="text" name="key">
        <input type="hidden" name="controller" value="productLevelPrice">
        <input type="hidden" name="action" value="search">
        <button>Search</button>
    </form>
    <table border = 1>
        <tr>
            <td>ID</td><td>Quantity</td><td>Price</td><td>TotalColor</td>
            <td>Product</td><td>update</td><td>delete</td>
        </tr>

        <?php 

        foreach($productLevelPrice_list as $productLevelPrice){
            echo "<tr> <td>$productLevelPrice->id</td>
            <td>$productLevelPrice->quantity</td> <td>$productLevelPrice->price</td>
            <td>$productLevelPrice->productColorTotal</td> <td>$productLevelPrice->productName</td> 
            <td><a href=?controller=productLevelPrice&action=updateForm&PL_ID=$productLevelPrice->id> update </a></td>
            <td><a href=?controller=productLevelPrice&action=deleteConfirm&PL_ID=$productLevelPrice->id> delete </a></td> </tr>";
        }
        
        echo "</table>";
        ?>