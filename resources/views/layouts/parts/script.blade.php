    <!-- jquery
        ============================================ -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('assets/js/jquery-price-slider.js') }}"></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu/metisMenu-active.js') }}"></script>
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ asset('assets/js/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/js/sparkline/jquery.charts-sparkline.js') }}"></script>
    <!-- calendar JS
        ============================================ -->
    <script src="{{ asset('assets/js/calendar/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/calendar/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/js/calendar/fullcalendar-active.js') }}"></script>

    <script src="{{ asset('assets/js/data-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/tableExport.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/data-table-active.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/bootstrap-table-editable.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/bootstrap-table-resizable.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/colResizable-1.5.source.js') }}"></script>
    <script src="{{ asset('assets/js/data-table/bootstrap-table-export.js') }}"></script>
    <!--  editable JS
        ============================================ -->
    <script src="{{ asset('assets/js/editable/jquery.mockjax.js') }}"></script>
    <script src="{{ asset('assets/js/editable/mock-active.js') }}"></script>
    <script src="{{ asset('assets/js/editable/select2.js') }}"></script>
    <script src="{{ asset('assets/js/editable/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/editable/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ asset('assets/js/editable/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('assets/js/editable/xediable-active.js') }}"></script>


    <!-- maskedinput JS
        ============================================ -->
    <script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/masking-active.js') }}"></script>
    <!-- datepicker JS
        ============================================ -->
    <script src="{{ asset('assets/js/datepicker/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/datepicker-active.js') }}"></script>
    <!-- form validate JS
        ============================================ -->
    <script src="{{ asset('assets/js/form-validation/jquery.form.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-validation/form-active.js') }}"></script>
    <!-- dropzone JS
        ============================================ -->
    <script src="{{ asset('assets/js/dropzone/dropzone.js') }}"></script>
    <!-- tab JS
        ============================================ -->
    <script src="{{ asset('assets/js/tab.js') }}"></script>
    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- tawk chat JS
        ============================================ -->
    <!-- <script src="{{ asset('assets/js/tawk-chat.js') }}"></script> -->

    <script>
    

    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}", 'Success!')
    @endif

    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}", 'Warning!')
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}", 'Error!')
    @endif
    @if((request()->routeIs('chiefengineer.assign')))
    $(document).ready(function(){
        if(($('#project_type').val()) == 'contract')
        {
            $('#displaycontract').show();
            $('#displayvilla').hide();
        }
        else if(($('#project_type').val()) == 'villa'){
            $('#displaycontract').hide();
            $('#displayvilla').show();
        }
        else
        {
            $('#displaycontract').hide();
            $('#displayvilla').hide();
        }
        
        $('#project_type').on('change',function(e){
            var type =$(this).val();
            if(type == 'contract'){
                $('#displaycontract').show();
                $('#displayvilla').hide();
            }
            else if(type == 'villa')
            {
                $('#displayvilla').show();
                $('#displaycontract').hide();
            }
            else{
                $('#displaycontract').hide();
            $('#displayvilla').hide();
            }
            // alert(type);
        });
       
    });
    @endif
    @if((request()->routeIs('siteengineer.material_order.create')) or (request()->routeIs('siteengineer.material_order.edit')))

    $(document).ready(function(){
        if(($('#project_type').val()) == 'contract')
        {
            $('#displaycontract').show();
            $('#displayvilla').hide();
        }
        else if(($('#project_type').val()) == 'villa'){
            $('#displaycontract').hide();
            $('#displayvilla').show();
        }
        else
        {
            $('#displaycontract').hide();
            $('#displayvilla').hide();
        }
        
        $('#project_type').on('change',function(e){
            var type =$(this).val();
            if(type == 'contract'){
                $('#displaycontract').show();
                $('#displayvilla').hide();
            }
            else if(type == 'villa')
            {
                $('#displayvilla').show();
                $('#displaycontract').hide();
            }
            else{
                $('#displaycontract').hide();
            $('#displayvilla').hide();
            }
            // alert(type);
        });
        $('.add_item').on('click',function(e){
            e.preventDefault();

            var rowd='<tr><td><select name="meterial_id[]" class="form-control"><option value="">Select Material</option>@foreach($materials as $material)<option value="{{$material->id}}">{{$material->meterial_name}}</option>@endforeach</select></td><td><input class="form-control" name="quantity[]" type="number" min="0"></td><td><button class="btn btn-danger remove_item">Remove</button></td></tr>';
                
            $(".show_item").append(rowd);
        });
        $("body").on("click",".remove_item",function(){
          
            $(this).closest("tr").remove();
            
          
        });

    });
    @endif
    @if((request()->routeIs('siteengineer.workentry.create'))or(request()->routeIs('siteengineer.workentry.edit')))
        $(document).ready(function(){
            if(($('#project_type').val()) == 'contract')
            {
                $('#displaycontract').show();
                $('#displayvilla').hide();
            }
            else if(($('#project_type').val()) == 'villa'){
                $('#displaycontract').hide();
                $('#displayvilla').show();
            }
            else
            {
                $('#displaycontract').hide();
                $('#displayvilla').hide();
            }
            
            $('#project_type').on('change',function(e){
                var type =$(this).val();
                if(type == 'contract'){
                    $('#displaycontract').show();
                    $('#displayvilla').hide();
                }
                else if(type == 'villa')
                {
                    $('#displayvilla').show();
                    $('#displaycontract').hide();
                }
                else{
                    $('#displaycontract').hide();
                $('#displayvilla').hide();
                }
                // alert(type);
            });
           
        });
    @endif
    @if(request()->routeIs('account.payment.create'))
        $(document).ready(function(){
            var load = $('#payment_type').val();
            switch(load)
            {
                case('project'):
                    $('#displayproject').show();
                    $('#displaymaterial').hide();
                    $('#displayexpense').hide();
                    $('#displayland').hide();
                    $('#displaycontract').hide();
                    $('#displayvilla').hide();
                    switch($('#project_type').val())
                    {
                        case('land'):
                            $('#displayland').show();
                        break;
                        case('contract'):
                            $('#displaycontract').show();
                        break;
                        case('villa'):
                            $('#displayvilla').show();
                        break;
                        default:
                            $('#displayland').hide();
                            $('#displaycontract').hide();
                            $('#displayvilla').hide();
                        break;
                    }
                break;
                case('material'):
                    $('#displaymaterial').show();
                    $('#displayproject').hide();
                    $('#displayexpense').hide();
                break;
                case('expense'):
                    $('#displayexpense').show();
                    $('#displayproject').hide();
                    $('#displaymaterial').hide();
                    switch($('#expense_type').val())
                    {
                        case('project'):
                            $('#displayprojecttype').show();
                        switch($('#expense_project_type').val())
                        {
                            case('land'):
                                $('#displayexpenseland').show();
                                $('#displayexpensecontract').hide();
                                $('#displayexpensevilla').hide();
                            break;
                            case('contract'):
                                $('#displayexpensecontract').show();
                                $('#displayexpenseland').hide();
                                $('#displayexpensevilla').hide();
                            break;
                            case('villa'):
                                $('#displayexpensevilla').show();
                                $('#displayexpenseland').hide();
                                $('#displayexpensecontract').hide();
                            break;
                            default:
                                $('#displayexpenseland').hide();
                                $('#displayexpensecontract').hide();
                                $('#displayexpensevilla').hide();
                            break;
                        }       
                        break;
                        default:
                            $('#displayprojecttype').hide();
                            $('#displayexpenseland').hide();
                            $('#displayexpensecontract').hide();
                            $('#displayexpensevilla').hide();
                        break;
                    }
                break;
                default:
                    $('#displayproject').hide();
                    $('#displaymaterial').hide();
                    $('#displayexpense').hide();
                break;

            }
            $('#payment_type').on('change',function(e){
                var type =$(this).val();
                switch (type)
                {
                    case ('project'):
                        $('#displayproject').show();
                        $('#displaymaterial').hide();

                        $('#displayexpense').hide();
                        $('#displayland').hide();
                        $('#displaycontract').hide();
                        $('#displayvilla').hide();
                        $('#customers').hide();
                        
                    break;
                    case ('material'):
                        $('#displayproject').hide();
                        $('#displaymaterial').show();
                        $('#displayexpense').hide();    
                    break;
                    case ('expense'):
                        $('#displayproject').hide();
                        $('#displaymaterial').hide();
                        $('#displayexpense').show();
                        $('#displayprojecttype').hide();
                        $('#displayexpenseland').hide();
                        $('#displayexpensecontract').hide();
                        $('#displayexpensevilla').hide();
                    break;
                    default:
                        $('#displayproject').hide();
                        $('#displaymaterial').hide();
                        $('#displayexpense').hide();    
                }
            });
            $('#project_type').on('change',function(e){
                var type1 =$(this).val();
                
                switch (type1)
                {
                    case ('land'):
                        $('#displayland').show();
                        $('#displaycontract').hide();
                        $('#displayvilla').hide();    
                        break;
                    case ('contract'):
                        $('#displayland').hide();
                        $('#displaycontract').show();
                        $('#displayvilla').hide();    
                        break;
                    case ('villa'):
                        $('#displayland').hide();
                        $('#displaycontract').hide();
                        $('#displayvilla').show();    
                        break;
                    default:
                        $('#displayland').hide();
                        $('#displaycontract').hide();
                        $('#displayvilla').hide();    
                        
                }
            });
            $('#land_project_id,#contract_project_id,#villa_project_id').on('change',function(e){
                var projectid =$(this).val();
                var projecttype = $('#project_type').val();

                $.ajax({
                    url: '/account/customersid',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        projectid: projectid,
                        projecttype: projecttype
                    },
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            $('#customers').show();
                            var customerSelect = $('#customer_id');
                            customerSelect.empty();
                            if (data && Object.keys(data).length > 0)
                            {
                                customerSelect.append($('<option>', {
                                        value: '',
                                        text: 'Select Customer' // Assuming your customer model has a "name" attribute
                                    }));
                                $.each(data, function(index, customer) {
                                    customerSelect.append($('<option>', {
                                        value: customer.id,
                                        text: customer.customer_name // Assuming your customer model has a "name" attribute
                                    }));
                                });
                                $('#total').val(0);
                                $('#paid').val(0);
                                $('#advance').val(0);
                                $('#oldpaid').val(0);
                                $('#pending').val(0);
                            }
                            else
                            {
                                alert('Select Other Project');
                                
                            }
                            // If payment data exists, fill the input fields
                            
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            });
            $('#customer_id').on('change',function(e){
                var customerid =$(this).val();
                var projecttype = $('#project_type').val();

                $.ajax({
                    url: '/account/customersdetails',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        customerid: customerid,
                        projecttype: projecttype
                    },
                    success: function (data) {
                        if (data) {
                            
                            if (data && Object.keys(data).length > 0)
                            {
                                $('#total').val(data.amount);
                                $('#advance').val(data.advance);
                                $('#paid').val(data.paid + data.advance);
                                $('#oldpaid').val(data.paid);
                                $('#pending').val((data.amount)-(data.paid + data.advance));
                                $('#amount').val('');
                            }
                            else
                            {
                                $('#total').val(0);
                                $('#paid').val(0);
                                $('#advance').val(0);
                                $('#oldpaid').val(0);
                                $('#pending').val(0);
                            }
                            // If payment data exists, fill the input fields
                            
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            });
            $('#amount').on('input', function () {
            var amount = Number($(this).val());
            var total = Number($('#total').val());
            var advance = Number($('#advance').val());
            var paid = Number($('#paid').val());
            var oldpaid = Number($('#oldpaid').val());
            var currentpay = (advance + oldpaid + amount);
            var pay = (total - currentpay);
            $('#paid').val(currentpay);
            $('#pending').val(pay);
            });
            $('#supplier_id').on('change',function(e){
                var supplier_id =$(this).val();
                
                $.ajax({
                    url: '/account/supplierdetails',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        supplier: supplier_id
                    },
                    success: function (data) {
                        if (data) {
                            console.log(data);
                            if (data && Object.keys(data).length > 0)
                            {
                                $('#mtotal').val(data.total);
                                $('#mpaid').val(data.paid);
                                $('#moldpaid').val(data.paid);
                                $('#mpending').val((data.total)-(data.paid));
                                $('#mamount').val('');
                            }
                            else
                            {
                                $('#mtotal').val(0);
                                $('#mpaid').val(0);
                                $('#moldpaid').val(0);
                                $('#mpending').val(0);
                            }
                            // If payment data exists, fill the input fields
                            
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            });
            $('#mamount').on('input', function () {
            var amount = Number($(this).val());
            var total = Number($('#mtotal').val());
            var paid = Number($('#mpaid').val());
            var oldpaid = Number($('#moldpaid').val());
            var currentpay = (oldpaid + amount);
            var pay = (total - currentpay);
            $('#mpaid').val(currentpay);
            $('#mpending').val(pay);
            });
            $('#expense_type').on('change',function(e){
                var type2 =$(this).val();
                if(type2 == 'project')
                {
                    $('#displayprojecttype').show();
                }
                else
                {
                    $('#displayprojecttype').hide();
                    $('#displayexpenseland').hide();
                        $('#displayexpensecontract').hide();
                        $('#displayexpensevilla').hide();
                }
            });
            $('#expense_project_type').on('change',function(e){
                var type3 =$(this).val();
                switch (type3)
                {
                    case ('land'):
                        $('#displayexpenseland').show();
                        $('#displayexpensecontract').hide();
                        $('#displayexpensevilla').hide();    
                        break;
                    case ('contract'):
                        $('#displayexpenseland').hide();
                        $('#displayexpensecontract').show();
                        $('#displayexpensevilla').hide();    
                        break;
                    case ('villa'):
                        $('#displayexpenseland').hide();
                        $('#displayexpensecontract').hide();
                        $('#displayexpensevilla').show();    
                        break;
                    default:
                        $('#displayexpenseland').hide();
                        $('#displayexpensecontract').hide();
                        $('#displayexpensevilla').hide();
                }
            });       
        });
    @endif
    @if((request()->routeIs('siteengineer.workerentry.create'))or(request()->routeIs('siteengineer.workerentry.edit')))
        $(document).ready(function(){
        if(($('#project_type').val()) == 'contract')
        {
            $('#displaycontract').show();
            $('#displayvilla').hide();
        }
        else if(($('#project_type').val()) == 'villa'){
            $('#displaycontract').hide();
            $('#displayvilla').show();
        }
        else
        {
            $('#displaycontract').hide();
            $('#displayvilla').hide();
        }
        
        $('#project_type').on('change',function(e){
            var type =$(this).val();
            if(type == 'contract'){
                $('#displaycontract').show();
                $('#displayvilla').hide();
            }
            else if(type == 'villa')
            {
                $('#displayvilla').show();
                $('#displaycontract').hide();
            }
            else{
                $('#displaycontract').hide();
            $('#displayvilla').hide();
            }
            // alert(type);
        });
       
    });
    $(document).ready(function(){
        $('.add_item').on('click',function(e){
            e.preventDefault();

            var rowd='<tr><td><select name="worker_type[]" class="form-control"><option value="">Select Worker Type</option>@foreach($workers as $worker)<option value="{{$worker->name}}">{{$worker->name}}</option>@endforeach</select></td><td><input class="form-control" name="count[]" type="number" min="0"></td><td><button class="btn btn-danger remove_item">Remove</button></td></tr>';
                
            $(".show_item").append(rowd);
        });
        $("body").on("click",".remove_item",function(){
          
            $(this).closest("tr").remove();
            
          
        });
        $('#contract_project_id, #villa_project_id').on('change', function () {
            var id = $(this).val();
            var type = $('#project_type').val();
            
            if (id) {
                // Make an AJAX request to fetch the payment data
                $.ajax({
                    url: '/site_engineer/payments/'+ type +'/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.mesthiri_id != null) {
                            console.log(data);
                            // alert(data.mesthiri_id);
                            $('#mesthiri_id').val(data.mesthiri_id);
                            // If payment data exists, fill the input fields
                            
                        }
                        else
                        {
                            alert('Mesthiri not Assigned for this site');
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            }
        });
    });
    @endif
    @if(request()->routeIs('chiefengineer.laboursupplier.create'))
        $(document).ready(function(){

            switch ($('#project_type').val())
            {
                case ('contract'):
                    $('#displaycontract').show();
                    $('#displayvilla').hide(); 
                    $('#displayv').hide();  
                break;
                case ('villa'):
                    $('#displaycontract').hide();
                    $('#displayvilla').show();
                    $('#displayv').show();
                break;
                
                default:
                    $('#displaycontract').hide();
                    $('#displayvilla').hide();
                    $('#displayv').hide();
                break;
            }
            $('#project_type').on('change',function(e){
                var type =$(this).val();
                
                switch (type)
                {
                    case ('contract'):
                        $('#displaycontract').show();
                        $('#displayvilla').hide();   
                        $('#displayv').hide();
                    break;
                    case ('villa'):
                        $('#displaycontract').hide();
                        $('#displayvilla').show();
                        $('#displayv').show();
                    break;
                    
                    default:
                        $('#displaycontract').hide();
                        $('#displayvilla').hide();
                        $('#displayv').hide();
                    break;
                }
            });
            $('#villa_project_id').on('change',function(e){
                var id = $(this).val();
                alert(id);
                $.ajax({
                    url:'/chief_engineer/villaviewlist',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success:function(data) {
                        if (data && Object.keys(data).length > 0)
                        {
                            var customerSelect = $('#villa_id');
                            customerSelect.empty();
                            customerSelect.append($('<option>', {
                                    value: '',
                                    text: 'Select Villa No' // Assuming your customer model has a "name" attribute
                                }));
                            $.each(data, function(index, villas) {
                                customerSelect.append($('<option>', {
                                    value: villas.id,
                                    text: villas.villa_no // Assuming your customer model has a "name" attribute
                                }));
                            });
                        }
                        else
                        {
                            alert('Select Other Project');
                        }
                    }
                });
            });
        });
    @endif
 @if((request()->routeIs('account.villacustomer.create')) or (request()->routeIs('account.villacustomer.edit')))
        $(document).ready(function(){
            $('#project_id').on('change',function(e){
            var projectid = $(this).val();
            // alert(projectid);
            
                $.ajax({
                    url: '/account/villalist',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: projectid
                    },
                    success: function (data) {
                        if (data) {
                            // console.log(data);
                            var customerSelect = $('#vilano');
                            customerSelect.empty();
                            if (data && Object.keys(data).length > 0)
                            {
                                customerSelect.append($('<option>', {
                                        value: '',
                                        text: 'Select Villa No' // Assuming your customer model has a "name" attribute
                                    }));
                                $.each(data, function(index, villas) {
                                    customerSelect.append($('<option>', {
                                        value: villas.id,
                                        text: villas.villa_no // Assuming your customer model has a "name" attribute
                                    }));
                                });
                            }
                            else
                            {
                                alert('Select Other Project');
                                
                            }
                            // If payment data exists, fill the input fields
                            
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            });
            $('#vilano').on('change',function(e){
                var villano = $(this).val();
                // alert(villano);
                $.ajax({
                    url: '/account/villaarea',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: villano
                    },
                    success: function (data) {
                        if (data) {
                            $('#villa_area').val(data.villa_area);
                        }
                    },
                    error: function () {
                        // Handle error if the AJAX request fails
                    }
                });
            });
        });
    @endif

@if((request()->routeIs('account.landcustomer.*')) or (request()->routeIs('account.contractcustomer.*')) or (request()->routeIs('account.villacustomer.*')))
    // Assuming you're using jQuery for simplicity
    
        $('#middle').hide();
        var lead = $('#leadfrom').val();
        if(lead == 'middleman') {
                $('#middle').show();
            } else {
                $('#middle').hide();
            }
        $(document).ready(function() {
            $('#leadfrom').change(function() {
                if ($(this).val() === 'middleman') {
                    $('#middle').show();
                } else {
                    $('#middle').hide();
                }
            });
        });

@endif

    // toast config
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "hideMethod": "fadeOut"
    }

</script>