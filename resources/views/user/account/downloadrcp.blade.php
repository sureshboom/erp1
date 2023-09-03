<!DOCTYPE html>
<html>
<meta charset="UTF-8">

<head>
    <title>Receipt</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
/*        border: 5px double #3e6c90;*/
        padding:2em 1em !important;
        color:#3e6c90;
    }
    
    
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .p-5{
        padding: 5px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .mt-15{
        margin-top:20px;
    }
    .mt-18{
        margin-top:30px;
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
    .text-left{
        text-align: left !important;
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
    
    .float-left{
        float:left;
    }
    
    .btb
    {
        border-bottom: 1px dotted black;
/*        padding-bottom: 5px;*/
    }
    
    .float-right
    {
        float: right;
    }
    
    .f10{
        font-size: 14px;
    }
    .bo {
        border: 3px solid #3e6c90;
        font-style: italic;
        padding: 5px;
        border-radius: 10px;
        text-transform: uppercase;
    }
    .mtb
    {
        border-top: 1px solid #000;
        margin-left: 20%;
        text-align: center;
        margin-right: 20%;
        
    }
    .w-40
    {
        width: 40%!important;
    }
    
    ul li {
        line-height:25px;
    }
    @page { size: portrait; }
    #pageborder {
      position:fixed;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      border: 4px double #3e6c90;
    }
    .ti {
        text-indent: 20px!important;
    }
    .small-row {
        line-height: 0.5; /* Adjust this value to control the row height */
    }
</style>
<body>
    <div id="pageborder">
  </div>
<div class="head-title">
    <h1 class="text-center m-0 p-0">
        <img src="data:image/png;base64,{{ $imageData }}" class="w-40">
    </h1>
</div>
<div class="head-title">
    <h2 class="text-center m-10 p-0">
        <span class="bo">Booking Confirmation</span>
    </h2>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left text-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">No - <span class="gray-color">#{{ $customer->id ? $customer->id : '' }}</span></p>
        
    </div>
    <div class="w-50 float-right text-right mt-10">
        <p class="m-0 pt-5 text-bold w-100 "> Date - <span class="gray-color">{{ $customer->created_at ? date('d-m-Y', strtotime($customer->created_at)) : '' }}</span></p>
    </div>
    <div style="clear: both;"></div>
</div>


<div >
    <h3>Customer Details</h3>
    <table class="w-100 payment-table ti" align="left" style=" margin-top: -20px;">
        <tr class="m-0 small-row">
            <td class="w-20 gray-color">
                <h4 >Customer Name :</h4>
            </td>
            <td class="text-left" >
                <p class="btb">{{ $customer->customer_name}}</p>
            </td>
        </tr>
        <tr class="m-0 small-row">
            <td class="w-20 gray-color">
                <h4 >AadharCard No :</h4>
            </td>
            <td class="text-left">
                
                <p class="btb">{{ $customer->aadharno}}</p>
            </td>
        </tr>
        <tr class="small-row">
            <td class="w-20 gray-color">
                <h4 >Address :</h4>
            </td>
            <td class="text-left">
                
                <p class="btb">{{ $customer->location}}</p>
            </td>
        </tr>
        
    </table>
    <!-- <div style="clear: both;"></div> -->
</div>

<div class="mt-10">
    @switch($type)
     @case('land')
        <h4 >
            Project Name <span class="btb gray-color">&nbsp;{{$customer->landproject->project_name}}&nbsp;&nbsp;</span> &nbsp;Plot No <span class="btb gray-color">&nbsp;{{$customer->plotno}}&nbsp;&nbsp;</span>&nbsp;Plot Area <span class="btb gray-color">&nbsp;{{$customer->plot_area}}&nbsp;</span>
        </h4>
     @break
     @case('contract')
        <h4>
            Location <span class="btb gray-color">&nbsp;{{$customer->contractproject->location}}&nbsp;&nbsp;</span> &nbsp;Total Area <span class="btb gray-color">&nbsp;{{$customer->contractproject->total_land_area}}&nbsp;&nbsp;</span>&nbsp;Buildup Area <span class="btb gray-color">&nbsp;{{$customer->contractproject->total_buildup_area}}&nbsp;</span>
            
            
        </h4>
     @break
     @case('villa')
        <h4>
            Project Name: <span class="btb gray-color">&nbsp;{{$customer->villaproject->project_name}}&nbsp;&nbsp;</span>&nbsp;Villa No <span class="btb gray-color">&nbsp;{{$customer->villa->villa_no}}&nbsp;&nbsp;</span>&nbsp;Villa Area <span class="btb gray-color">&nbsp;{{$customer->villa_area}}&nbsp;</span>
            
        </h4>
     @break
     @default
     <p></p>
    @endswitch
    <h4>Facing: <span class="gray-color">( North / South / East / West)</span></h4>
</div>

<div class="mt-10">
    <h3>Amount Finalization</h3>
    @switch($type)
        @case('land')
            <h4 class="gray-color ti">Total Amount : Rs.{{ moneyFormatIndia($customer->amount).'.00'}} &nbsp;For Project: <span class="btb">{{$customer->landproject->project_name}}</span> and Plot No {{$customer->plotno}}.
            </h4>
        @break
        @case('contract')
            <h4 class="gray-color ti">Total Amount : Rs.{{ moneyFormatIndia($customer->amount).'.00'}} &nbsp;For Project: <span class="btb">{{$customer->contractproject->project_name}}</span> Total Area {{$customer->contractproject->total_land_area}}&nbsp;&nbsp;and Buildup Area {{$customer->contractproject->total_buildup_area}}.
            </h4>
        @break
        @case('villa')
            <h4 class="gray-color ti">Total Amount : Rs.{{ moneyFormatIndia($customer->amount).'.00'}} &nbsp;For Project: <span class="btb">{{$customer->villaproject->project_name}}</span> and Villa No {{$customer->vilano}}.
            </h4>
        @break
    @endswitch
    <h4 class="ti gray-color">Payment Mode: ( Cash / Bank Transfor / Other Payment)</h4>
    @switch($type)
        @case('land')
            <h4 class="gray-color ti">I here by willing to accept this offer for the {{ ucfirst($type)}}. and Plot No {{ $customer->plotno}}</h4>
        @break
        @case('contract')
            <h4 class="gray-color ti">I here by willing to accept this offer for the {{ ucfirst($type)}} Construction.</h4>
        @break
        @case('villa')
            <h4 class="gray-color ti">I here by willing to accept this offer for the {{ ucfirst($type)}} Project and Villa No {{$customer->vilano}}.</h4>
        @break
    @endswitch
</div>

<div class="">
    
    <h3 class="">Terms & conditions</h3>
    <h4 class="gray-color">
         <ul>
             <li> 1% of total Amount as advance.</li>
             <li> 5000 rs for cancellation.</li>
             <li> additional charges may apply for banking operation & registration related works etc..</li>
         </ul>
    </h4>
</div>
<div class="table-section bill-tbl w-100 mt-18">
    <table class="w-100 notable ">
        
        <tr>
            <td class="w-20">
                <!-- <p class="mtb text-center"></p> -->
                <h4 class="">For SKS</h4>
            </td>
            <td class="w-33">
                
                
            </td>
            <td class="w-33">
                <!-- <p class="mtb text-center "></p> -->
                <h4 class="text-right">Customer Signature </h4>
            </td>
        </tr>
    </table>
</div>

</html>
