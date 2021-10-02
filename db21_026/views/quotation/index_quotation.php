<br>
new quatation <a href="?controller=quotation&action=newQuotation">click</a>
<form method="get" action="">
    <input type="text" name="key">
    <input type="hidden" name="controller" value="quotation"/>
    <button type="submit" name="action" value="search">Search</button>
</form>
<table border = 1>
<tr><td>No</td><td>Date</td><td>EmployeeName</td>
<td>CustomerName</td><td>Deposit</td><td>Credit_Day</td></tr>
<?php foreach($quotation_list as $quotation)
{
    echo "<tr><td>$quotation->C_No</td>
    <td>$quotation->Date</td><td>$quotation->EmName</td>
    <td>$quotation->CusName</td><td>$quotation->Deposit</td>
    <td>$quotation->Credit_Day</td><td><a href=?controller=quotation&action=updateForm&C_No=$quotation->C_No>update</a></td>
    <td><a href=?controller=quotation&action=deleteConfirm&C_No=$quotation->C_No>delete</a></td></tr>";
}
echo "</table>";?>
