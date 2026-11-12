<script  src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>


<!-- Bootstrap -->
<script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>


<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>


{{-- DataTables Core JS --}}

<script
    nonce="{{ app('cspNonce') }}"
    src="{{asset('public/dist/js/dataTables.min.js')}}">
</script>


{{-- DataTables Bootstrap 4 Integration --}}

<script
    nonce="{{ app('cspNonce') }}"
    src="{{asset('public/dist/js/dataTables.bootstrap4.min.js')}}">
</script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('public/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('public/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('public/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>

<!-- ChartJS -->


<script  nonce="{{ app('cspNonce') }}">
    $(document).ready(function() {
        $(".mt-2 li a.nav-link").click(function (e) {
            if(!$(this).hasClass('active'))
            {
                $(".mt-2 li a.nav-link").removeClass("active");
                $(this).addClass("active");   
            }
        });
    });
</script>
<script  nonce="{{ app('cspNonce') }}">
     $("body").on('click','.old-password',function(){
        $(this).toggleClass("fa-eye-slash");

        if ($("#old_password").attr("type") === "password") {
            $("#old_password").attr("type", "text");
        } else {
            $("#old_password").attr("type", "password");
        }
    });
    $("body").on('click','.toggle-password',function(){
        $(this).toggleClass("fa-eye-slash");

        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
        }
    });
    $("body").on('click','.confirm_password',function(){
        $(this).toggleClass("fa-eye-slash");

        if ($("#confirm_password").attr("type") === "password") {
            $("#confirm_password").attr("type", "text");
        } else {
            $("#confirm_password").attr("type", "password");
        }
    });
</script>
<script  nonce="{{ app('cspNonce') }}">
    $("body").on('click','.new_password',function(){
        $(this).toggleClass("fa-eye-slash");

        if ($("#new_password").attr("type") === "password") {
            $("#new_password").attr("type", "text");
        } else {
            $("#new_password").attr("type", "password");
        }
    });
    $(function() {
        // Summernote
        /* $('.summernote').summernote({
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                
                // ['para', ['ol', 'ul', 'paragraph', 'height']],
                // ['table', ['table']],
                // ['insert', ['link']],
                // ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
            ]
        }); */
        
    });
</script>


@yield('after-scripts')
