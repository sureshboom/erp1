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
@if((request()->routeIs('siteengineer.material_order.create')) or (request()->routeIs('siteengineer.material_order.edit')))

    $(document).ready(function(){
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