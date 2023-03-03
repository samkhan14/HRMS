<!DOCTYPE html>
<html lang="en">

<head>
    <title> HRMS | @yield('title') </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">

    <style>
        .avatar>img {
            height: 100%;
        }

        .btn-checkin {
            position: absolute;
            left: 30%;
            top: 13px;
            background: #ff9b44;
            color: #fff;
            font-size: 14px;
            font-weight: initial;
            padding: 6px 40px;
            border-radius: 20px;
        }
    </style>

</head>

<body>
    <div class="main-wrapper">
        {{-- loader --}}
        <div id="loader-wrapper">
            <div id="loader">
                <div class="loader-ellips">
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                    <span class="loader-ellips__dot"></span>
                </div>
            </div>
        </div>

        @include('portal_pages.layouts.header')
        @include('portal_pages.layouts.sidebar')
        @yield('content')
    </div>
    {{-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{asset('assets/js/jquery-3.5.1.min.js')}}"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    {{-- <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/select2.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

    <script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>


    <script>
        // save designation via ajax
        $(document).ready(function() {
            $('#saveDesignation').on('submit', function(e) {
                e.preventDefault();

                var designationName = $('#des_title').val();
                // console.log(designationName)
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                });

                $.ajax({
                    url: "{{ route('designations.store')}}",
                    type: "POST",
                    dataType: "json",
                    data: $("#saveDesignation").serialize(),
                    success: function(data) {
                        console.log("Added", data)
                        $('#add_designation').modal('hide');
                        $('#outputmsg').text(data.res);
                        $('#add_designation').find('input[type=text]').val("");
                        table.draw();
                    },
                    error: function(data) {
                        console.log("Error", data)
                    }
                })
            });
        });
    </script>


    <!-- <script>
jQuery(document).on('click', 'roleUpdate', function(){
  var _this = jQuery(this).parents('tr');
  jQuery('#role_id').val(_this.find('.id').text());
  jQuery('#role_name').val(_this.find('.name').text());

});
</script> -->

</body>

</html>
