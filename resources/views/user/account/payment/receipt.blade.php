<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
    <title>Receipt</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
        border: 5px double #3e6c90;
        padding:2em 1em !important;
        color:#3e6c90;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .mt-20{
        margin-top:60px!important;
    }
    .text-center{
        text-align:center !important;
    }
    .text-right{
        text-align: right !important;
    }
    .w-100{
        width: 100%;
    }
    }
    .w-33{
        width:33%;   
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .w-20{
        width:25%;   
    }
    
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
    .btb
    {
        border-bottom: 1px dotted black;
        padding-bottom: 5px;
    }
    .paid
    {
        display: block;
    }
    .float-right
    {
        float: right;
    }
    .notable {
        border: none;
    }
    .f10{
        font-size: 14px;
    }
    .bo {
        border: 3px solid #3e6c90;
        font-style: italic;
        padding: 5px;
        border-radius: 10px;
    }
    .mtb
    {
        border-top: 1px solid #000;
        margin-left: 20%;
        
        text-align: center;
        margin-right: 20%;
        
    }
    .box {
        border: 1px solid #3e6c90;
        padding: 20px 15px;
        margin-top: -10px;

    }
    @page { size: landscape; }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">
        <img src="data:image/png;base64,{{ $imageData }}" class="w-50">
    </h1>
</div>
<div class="head-title">
    <h2 class="text-center m-10 p-0">
        <span class="bo">PAYMENT VOUCHER</span>
    </h2>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">No - <span class="gray-color">#{{ $payment->id ? $payment->id : '' }}</span></p>
        
    </div>
    <div class="w-50 float-left logo mt-10">
        <p class="m-0 pt-5 text-bold w-100 text-right"> Date - <span class="gray-color">{{ $payment->payment_date ? date('d-m-Y', strtotime($payment->payment_date)) : '' }}</span></p>
    </div>
    <div style="clear: both;"></div>
</div>
<div class="paid">
    
    
</div>
<div class="table-section bill-tbl w-100 mt-10">
    <table class="w-100 notable mt-10">
        
        <tr>
            <td class="w-20">
                <h4 >Paid to: </h4>
            </td>
            <td>
                <p class="btb gray-color">
                    @switch($payment->payment_type)
                        @case('project')
                            @switch($payment->payment_subtype)
                                @case('land')
                                    {{$payment->landcustomer->customer_name}}
                                @break
                                @case('villa')
                                    {{$payment->villacustomer->customer_name}}
                                @break
                                @case('contract')
                                    {{$payment->contractcustomer->customer_name}}
                                @break
                                @default
                                -
                            @endswitch
                        @break
                        @case('material')
                            {{$payment->supplier->supplier_name}}
                        @break
                        @case('expense')
                            Staff
                        @break
                        @default
                        -
                    @endswitch
                    
                </p>
            </td>
        </tr>

        <tr>
            <td class="w-20">
                <h4>On Account of: </h4>
            </td>
            <td>
                @switch($payment->payment_type)
                        @case('project')
                            @switch($payment->payment_subtype)
                                @case('land')
                                    <p class="btb gray-color">Land Project - {{$payment->landproject->project_name}}</p>
                                @break
                                @case('villa')
                                    <p class="btb gray-color">Villa Project - {{$payment->villaproject->project_name}}</p>
                                @break
                                @case('contract')
                                    <p class="btb gray-color">Contract Project - {{$payment->contractproject->project_name}}</p>
                                @break
                                @default
                                -
                            @endswitch
                        @break
                        @case('material')
                            Supplier Payment 
                        @break
                        @case('expense')
                            @if($payment->payment_subtype == 'office')
                                <p class="btb gray-color">Office Purpose - {{ucfirst($payment->expense_for)}}</p>
                            @else
                                @switch($payment->expense_project_type)
                                    
                                    @case('land')
                                        <p class="btb gray-color">Land Project : <span>{{ $payment->landproject->project_name ? $payment->landproject->project_name : '' }}
                                            </span> - {{ucfirst($payment->expense_for)}}</p>
                                    @break;
                                    @case('contract')
                                        <p class="btb gray-color">Contract Project : <span>{{ $payment->landproject->project_name ? $payment->landproject->project_name : '' }}
                                            </span> - {{ucfirst($payment->expense_for)}}</p>
                                    @break;
                                    @case('villa')
                                        <p class="btb gray-color">Villa Project : <span>{{ $payment->landproject->project_name ? $payment->landproject->project_name : '' }}
                                            </span> - {{ucfirst($payment->expense_for)}}</p>
                                    @break;
                                    @default
                                    <p class="btb gray-color"></p>
                                    @endswitch
                                
                            @endif 
                        @break
                        @default
                        <p class="btb gray-color"></p>
                    @endswitch
                
            </td>
        </tr>
        <tr>
            <td class="w-20">
                <h4>Amount in Words: </h4>
            </td>
            <td>
                <p class="btb gray-color f10">{{AmountInWords($payment->amount)}}</p>
            </td>
        </tr>
    </table>
</div>

<div class="table-section bill-tbl w-100 mt-20">
    <table class="w-100 notable ">
        
        <tr>
            <td class="w-20">
                <h4 class="box">{{ 'Rs.'.moneyFormatIndia($payment->amount).'.00' }}</h4>
            </td>
            <td class="w-33">
                <p class="mtb text-center"></p>
                <h4 class="text-center">Prepared By </h4>
            </td>
            <td class="w-33">
                <p class="mtb text-center "></p>
                <h4 class="text-center">Received By </h4>
            </td>
        </tr>
    </table>
</div>

</html>
