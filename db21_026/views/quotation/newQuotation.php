<br>
<form method="get" action="">
    <label>No <input type="text" name="C_No"></label><br>
    <label>Date <input type="date" name="Date"></label><br>
    <label>EmployeeName <select name="Em_ID">
    <?php
        foreach ($employee_list as $employee) {
            echo "<option value=$employee->Em_ID>$employee->EmName</option>";
        }?> </select></label><br>
    <label>CustomerName <select name="Cus_ID">
        <?php
        foreach ($customer_list as $customer) {
            echo "<option value=$customer->Cus_ID>$customer->CusName</option>";
        }?> </select></label><br>
    <label>Deposit <input type="number" name="Deposit" min="0" max="100"></label><br>
    <label>Credit_Day <input type="number" name="Credit_Day" min="0" max="256"></label><br>
    <input type="hidden" name="controller" value="quotation" />
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="addQuotation">Save</button>
</form>