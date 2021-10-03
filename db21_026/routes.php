<?php
$controllers = array('pages'=>['home','error'],'quotation'=>['index','newQuotation','addQuotation','search','updateForm','update','deleteConfirm','delete']
                    ,'quotationlist'=>['index','newQuotationlist','addQuotationlist','search','updateForm','update','deleteConfirm','delete']);

function call($controller,$action){
    require_once("controllers/".$controller."_controller.php");
    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'quotation':
            require_once("models/quotationModel.php");
            require_once("models/customerModel.php");
            require_once("models/employeeModel.php");
            $controller = new QuotationController();
            break;
        case 'quotationlist':
            require_once("models/quotationlistModel.php");
            require_once("models/quotationModel.php");
            require_once("models/colorModel.php");
            $controller = new QuotationlistController();
            break;

    }
    $controller->{$action}();
}

if(array_key_exists($controller,$controllers))
{
    if(in_array($action,$controllers[$controller]))
    {
        call($controller,$action);
    }
    else
    {
        call('pages','error');
    }
}
else
{
    call('pages','error');
}
?>