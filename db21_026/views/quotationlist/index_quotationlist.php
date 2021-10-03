
<br>
new quotationlist <a href="?controller=quotationlist&action=newQuotationlist">click</a>
<form method="get" action="">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="quotationlist"/>
    <button type="submit" name="action" value="search">Search</button>
</form>
<table border = 1>
<tr><td>CL_No</td><td>Quantity</td><td>Color_Print</td><td>ColorName</td><td>C_No</td></tr>

<?php foreach($quotation_list as $quotationlist)
{
  echo "<tr><td>$quotationlist->cl_no</td> 
  <td>$quotationlist->quantity</td><td>$quotationlist->color_print</td>
  <td>$quotationlist->colorname</td>
  <td>$quotationlist->c_no</td><td><a href=?controller=quotationlist&action=updateForm&CL_No=$quotationlist->cl_no>update</td>
  <td><a href=?controller=quotationlist&action=deleteConfirm&CL_No=$quotationlist->cl_no>delete</td></tr>";

}


?>