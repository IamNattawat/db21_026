<br>
<form method="get" action="">
    <label>No <input type="text" name="AC_No" value="<?php echo $quotation->C_No?>"></label><br>
    <label>Date <input type="date" name="Date" value="<?php echo $quotation->Date;?>"></label><br>
    <label>EmployeeName <select name="Em_ID">
    <?php
        foreach ($employee_list as $employee) {
            echo "<option value=$employee->Em_ID";
            if($employee->Em_ID==$quotation->Em_ID){echo " selected='selected'";}
            echo ">$employee->EmName</option>";
        }?> </select></label><br>
    <label>CustomerName <select name="Cus_ID">
        <?php
        foreach ($customer_list as $customer) {
            echo "<option value=$customer->Cus_ID";
            if($customer->Cus_ID==$quotation->Cus_ID){echo " selected='selected'";}
            echo ">$customer->CusName</option>";
        }?> </select></label><br>
    <label>Deposit <input type="number" name="Deposit" min="0" max="100"
            value="<?php echo $quotation->Deposit;?>"></label><br>
    <label>Credit_Day <input type="number" name="Credit_Day" min="0" max="256"
            value="<?php echo $quotation->Credit_Day;?>"></label><br>
    <input type="hidden" name="BC_No" value="<?php echo $quotation->C_No;?>" />
    <input type="hidden" name="controller" value="quotation" />
    <button type="submit" name="action" value="index">Back</button>
    <button type="submit" name="action" value="update">update</button>
</form>