<?php
class QuotationlistController
{
    public function index()
    {
        $quotation_list = Quotationlist::getAll();
        require_once("views/quotationlist/index_quotationlist.php");
    }

    public function newQuotationlist()
    {
        $quotationlist_list = Quotationlist::getAll();
        $color_list = Color::getAll();
        $quotation_list = Quotation::getAll();
        require_once("views/quotationlist/newQuotationlist.php");

    }

    public function addQuotationlist()
    {
        $CL_No = $_GET['cl_no'];
        $Quantity = $_GET['quantity'];
        $Color_Print = $_GET['color_print'];
        $PC_ID = $_GET['PC_ID'];
        $C_No = $_GET['C_NO'];
        Quotationlist::add($CL_No,$Quantity,$Color_Print,$PC_ID,$C_No);
        QuotationlistController::index();

    }

    public function search()
    {
        $key = $_GET["key"];
        $quotation_list = Quotationlist::search($key);
        require_once("views/quotationlist/index_quotationlist.php");
    }

    public function updateForm()
    {
        $CL_No = $_GET["CL_No"];
        $quotationlist_list = Quotationlist::get($CL_No);
        $color_list = Color::getAll();
        $quotation_list = Quotation::getAll();
        require_once("views/quotationlist/updateForm.php");
    }

    public function update()
    {
        $aCL_No = $_GET['1cl_no'];
        $bCL_No = $_GET['2cl_no'];
        $Quantity = $_GET['quantity'];
        $Color_Print = $_GET['color_print'];
        $PC_ID = $_GET['PC_ID'];
        $C_No = $_GET['C_NO'];
        Quotationlist::update($aCL_No,$bCL_No,$Quantity,$Color_Print,$PC_ID,$C_No);
        QuotationlistController::index();
    }

    public function deleteConfirm()
    {
        $CL_No = $_GET["CL_No"];
        $quotationlist_list = Quotationlist::get($CL_No);
        require_once("views/quotationlist/deleteConfirm.php");
    }

    public function delete()
    {
        $CL_No = $_GET["CL_No"];
        Quotationlist::delete($CL_No);
        QuotationlistController::index();
    }

}
?>