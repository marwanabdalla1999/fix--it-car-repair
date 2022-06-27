@section('footer')
    <footer>
        <div class="clearfix"></div>
    </footer>
    </div>
    </div>
    <script src="{{asset('assets/backend/vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/fastclick/lib/fastclick.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/nprogress/nprogress.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/google-code-prettify/src/prettify.js')}}"></script>

    <script src="{{asset('assets/backend/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>

    <script src="{{asset('assets/backend/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('assets/backend/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-datetimepicker -->
    <script src="{{asset('assets/backend/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('assets/backend/build/js/custom.min.js')}}"></script>
    <script src="{{asset('assets/backend/custom/chat.js')}}"></script>
    <script src="{{asset('assets/backend/imgzom/src/js/jquery.pan.js')}}"></script>
    <script src="{{asset('assets/backend/custom/dp.js')}}"></script>
    <script src="{{asset('assets/backend/custom/custom.js')}}"></script>


    <script>
        let URL = "{{url('/')}}";
        let Token="{{csrf_token()}}";

        CKEDITOR.replace('description');
    </script>

    </body>
    </html>

@endsection
