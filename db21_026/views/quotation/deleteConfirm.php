<?php echo "<br>Are you sure to delete this quotation <br>
        <br> No.$quotation->C_No <br>";?>
<form method="get" action="" >
    <input type="hidden" name="C_No" value="<?php echo $quotation->C_No;?>" />
    <input type="hidden" name="controller" value="quotation" />
    <button type="submit" name="action" value="index"> Back</button>
    <button type="submit" name="action" value="delete"> Delete</button>
</form>