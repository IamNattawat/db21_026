<br>
<form method="get" action="">
    <label>CL_No <input type="text" name="cl_no"></label><br>
    <label>Quantity <input type="number" name="quantity"></label><br>
    <label>Color_Print <input type="number" name="color_print"></label><br>
    <label>ColorName <select name="PC_ID">
    <?php
        foreach ($color_list as $color){
            echo "<option value=$color->Col_ID>$color->ColName</option>";
        }?> </select></label><br>
    <label>C_No <select name="C_NO">
    <?php
        foreach ($quotation_list as $quotation){
            echo "<option value=$quotation->C_No>$quotation->C_No</option>";
        }?></select></label><br>
    <input type="hidden" name="controller" value="quotationlist" />
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="addQuotationlist">Save</button>
</form>