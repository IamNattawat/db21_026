<br>
<form method="get" action="">
<label>CL_No <input type="text" name="1cl_no" value="<?php echo $quotationlist_list->cl_no?>"></label><br>
    <label>Quantity <input type="number" name="quantity" value="<?php echo $quotationlist_list->quantity?>"></label><br>
    <label>Color_Print <input type="number" name="color_print" value="<?php echo $quotationlist_list->color_print?>"></label><br>
    <label>ColorName <select name="PC_ID">
    <?php
        foreach ($color_list as $color){
            echo "<option value=$color->Col_ID";
            if($color->Col_ID==$quotationlist_list->pc_id){echo " selected='selected'";}
            echo ">$color->ColName</option>";
        }?> </select></label><br>
    <label>C_No <select name="C_NO">
    <?php
        foreach ($quotation_list as $quotation){
            echo "<option value=$quotation->C_No";
            if($quotation->C_No==$quotationlist_list->c_no){echo " selected='selected'";}
            echo ">$quotation->C_No</option>";
        }?></select></label><br>
    <input type="hidden" name="2cl_no" value="<?php echo $quotationlist_list->cl_no;?>" />
    <input type="hidden" name="controller" value="quotationlist" />
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="update">Update</button>
</form>