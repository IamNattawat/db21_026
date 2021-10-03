<?php echo "<br>Are you sure to delete this quotationlist <br>
        <br> CL_No.$quotationlist_list->cl_no <br>";?>
<form method="get" action="" >
    <input type="hidden" name="CL_No" value="<?php echo $quotationlist_list->cl_no;?>" />
    <input type="hidden" name="controller" value="quotationlist" />
    <button type="submit" name="action" value="index"> Back</button>
    <button type="submit" name="action" value="delete"> Delete</button>
</form>