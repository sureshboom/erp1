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
    
    @if((request()->routeIs('villacustomer.create')) or (request()->routeIs('villacustomer.edit')))
        $(document).ready(function(){
            $('#project_id').on('change',function(e){
            var projectid = $(this).val();
            // alert(projectid);
            
                $.ajax({
                    url: '/admin/villalist',
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
                    url: '/admin/villaarea',
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
    @if(request()->routeIs('villa.create'))

        $(document).ready(function(){
        
            $('.add_item').on('click',function(e){
                e.preventDefault();

                var rowd='<tr><td><input class="form-control" name="villa_no[]" type="text" placeholder="Villa No" required></td><td><input class="form-control" placeholder="Villa Area" name="villa_area[]" type="text" required></td><td><button class="btn btn-danger remove_item">Remove</button></td></tr>';
                    
                $(".show_item").append(rowd);
            });
            $("body").on("click",".remove_item",function(){
              
                $(this).closest("tr").remove();
            });
        });
    @endif

    @if((request()->routeIs('landcustomer.*')) or (request()->routeIs('contractcustomer.*')) or (request()->routeIs('villacustomer.*')))
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