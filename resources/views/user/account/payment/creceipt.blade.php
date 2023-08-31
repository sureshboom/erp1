<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
    <title>Receipt</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
        
        
        color:#3e6c90;
    }
    .container
    {
     padding:2em 1em !important;   
     border: 5px double #3e6c90;
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
        border-bottom: 1px dotted #000;
        padding-bottom: 4px;
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
    @page { size: portrait; }

    .ti-20 {
        text-indent: 20px!important;
    }
    .ti-40 {
        text-indent: 40px!important;
    }
    .plr {
        width: 100%;
    }
    .btbr 
    {
        border-bottom:4px solid #fff !important;
        padding: 0 10px 1px 10px !important;

    }
    .ml{
        margin-left: 20px;
    }
    .blue-color {
        color: #3e6c90!important;
    }
    .paid
    {
        line-height: 0.4;
    }
</style>
<body>
<div class="container">
<div class="head-title">
    <h1 class="text-center m-0 p-0">
        <img src="data:image/png;base64,{{ $imageData }}" class="w-20">
    </h1>
</div>
<div class="head-title">
    <h2 class="text-center m-10 p-0">
        <span class="bo">PAYMENT RECEIPT</span>
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

<div class="paid ">
    <div class="ml">
        <h4 class="btb gray-color"><span class="btbr blue-color ">We received with thanks from Mr./Mrs./ </span>
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
        </h4>
    </div>
    <div class="gray-color">
        <h4 class="btb"><span class="btbr blue-color">Amount in Words:</span>
        {{AmountInWords($payment->amount)}}</h4>
    </div>
    <div class="gray-color">
        <h4 class="btb">
            @switch($payment->payment_subtype)
                    @case('land')
                        <span class="btbr blue-color">For Land Project </span>&nbsp;&nbsp;&nbsp; {{$payment->landproject->project_name}} &nbsp;&nbsp;&nbsp;<span class="btbr blue-color">Plot No: </span>{{$payment->landcustomer->plotno}} <span class="btbr blue-color">Plot Area: </span>{{$payment->landcustomer->plot_area}}
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
        </h4>
    </div>
    <div class="blue-color ">
        <h4>Mode of Payment: <span class="btb gray-color">&nbsp;&nbsp;{{$payment->payment_mode}}&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @switch($payment->payment_mode    )
                    @case('Gpay/Phonepay')
                        Gpay/Phonepay No: <span class="btb">{{$payment->payment_by}}</span>
                    @break
                    @case('Bank Transfor')
                        Account No: <span class="btb">{{$payment->payment_by}}</span>
                    @break
                    @case('Cheque')
                       Cheque No: <span class="btb">&nbsp;&nbsp;&nbsp;{{$payment->payment_by}}&nbsp;&nbsp;&nbsp;</span>
                    @break
                    @default
                    -
                @endswitch
                
        </h4>
    </div>
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
</div>
</body>
</html>
