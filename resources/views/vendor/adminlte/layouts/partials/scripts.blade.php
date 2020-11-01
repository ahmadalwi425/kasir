<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->

<!-- Bootstrap 3.3.6 JS -->

<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('js/select2.full.min.js') }}" type="text/javascript"></script> -->

<!-- <script src="{{ asset('/js/bootstrap-datepicker.js') }}" type="text/javascript"></script> -->
<script src="{{ asset('/js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/dataTables.bootstrap.js') }}" type="text/javascript"></script>

	 {!! HTML::script('js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!}
    {!! HTML::script('js/dataTables.bootstrap.min.js', array('type' => 'text/javascript')) !!}
     
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};
</script>
@yield('customscript')