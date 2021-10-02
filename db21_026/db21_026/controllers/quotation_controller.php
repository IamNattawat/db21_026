<?php
class QuotationController
{
    public function index()
    {
        $quotation_list = Quotation::getAll();
        require_once("views/quotation/index_quotation.php");
    }

    public function newQuotation()
    {
        $quotation_list = Quotation::getAll();
        $customer_list = Customer::getAll();
        $employee_list = Employee::getAll();
        require_once("views/quotation/newQuotation.php");
    }

    public function addQuotation()
    {
        $C_No = $_GET["C_No"];
        $Date = $_GET["Date"];
        $Em_ID = $_GET["Em_ID"];
        $Cus_ID = $_GET["Cus_ID"];
        $Deposit = $_GET["Deposit"];
        $Credit_Day = $_GET["Credit_Day"];

        Quotation::add($C_No,$Date,$Em_ID,$Cus_ID,$Deposit,$Credit_Day);
        QuotationController::index();
    }

    public function search()
    {
        $key = $_GET["key"];
        $quotation_list = Quotation::search($key);
        require_once("views/quotation/index_quotation.php");
    }

    public function updateForm()
    {
        $No = $_GET["C_No"];
        $quotation = Quotation::get($No);
        $customer_list = Customer::getAll();
        $employee_list = Employee::getAll();
        require_once("views/quotation/updateForm.php");
    }

    public function update()
    {
        $C_No = $_GET["C_No"];
        $Date = $_GET["Date"];
        $Em_ID = $_GET["Em_ID"];
        $Cus_ID = $_GET["Cus_ID"];
        $Deposit = $_GET["Deposit"];
        $Credit_Day = $_GET["Credit_Day"];

        Quotation::update($C_No,$Date,$Em_ID,$Cus_ID,$Deposit,$Credit_Day);
        QuotationController::index();
    }

    public function deleteConfirm()
    {
        $No = $_GET["C_No"];
        $quotation = Quotation::get($No);
        require_once("views/quotation/deleteConfirm.php");
    }

    public function delete()
    {
        $No = $_GET["C_No"];
        Quotation::delete($No);
        QuotationController::index();
    }
}
?>