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
        $(document).ready(function(){
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
                },
                error: function(data) {
                    console.log("Error", data)
                }
            })
        });
    });
    </script>


<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // create post
        $('#create-post-btn').click(function() {
            $('.error').remove();
            $('#postId').remove();
            $('#postModal #modalTitle').text('Create Post');
            $('#postForm')[0].reset();
            $('#postModal').modal('toggle');
        });

        // form validate and submit
        $('#postForm').validate({
            rules: {
                title: 'required',
                description: 'required',
            },
            messages: {
                title: 'Please enter the title',
                description: 'Please enter the description',
            },

            submitHandler: function(form) {
                const id = $('input[name=postId]').val();
                const formData = $(form).serializeArray();

                $.ajax({
                    url: 'posts',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        if (response && response.status === 'success') {

                            // clear form
                            $('#postForm')[0].reset();

                            // toggle modal
                            $('#postModal').modal('toggle');

                            $('#postsTable p').empty();

                            const data = response.data;

                            if (id) {
                                $("#post_" + id + " td:nth-child(2)").html(data.title);
                                $("#post_" + id + " td:nth-child(3)").html(data.description);
                            } else {
                                $('#postsTable').prepend(`<tr id=${'post_'+data.id}><td>${data.id}</td><td>${data.title}</td><td>${data.description}</td><td>
                            <a href="javascript:void(0)" data-id=${data.id} title="View" class="btn btn-sm btn-info btn-view"> View </a>
                            <a href="javascript:void(0)" data-id=${data.id} title="Edit" class="btn btn-sm btn-success btn-edit"> Edit </a>
                            <a href="javascript:void(0)" data-id=${data.id} title="Delete" class="btn btn-sm btn-danger btn-delete"> Delete </a></td></tr>`);
                            }
                        }
                    }
                });
            }
        })
    });

    // view button click
    $('.btn-view').click(function() {
        const id = $(this).data('id');
        $('label.error').remove();
        $('input[name=title]').removeClass('error');
        $('textarea[name=description]').removeClass('error');
        $('input[name=title]').attr('disabled', 'disabled');
        $('textarea[name=description]').attr('disabled', 'disabled');
        $('#postModal button[type=submit]').addClass('d-none');

        $.ajax({
            url: `posts/${id}`,
            type: 'GET',
            success: function(response) {
                if (response && response.status === 'success') {
                    const data = response.data;
                    $('#postModal #modalTitle').text('Post Detail');
                    $('#postModal input[name=title]').val(data.title);
                    $('#postModal textarea[name=description]').val(data.description);
                    $('#postModal').modal('toggle');
                }
            }
        })
    });

    // edit button click
    $('.btn-edit').click(function() {
        const id = $(this).data('id');
        $('label.error').remove();
        $('input[name=title]').removeClass('error');
        $('input[name=title]').after('<input type="hidden" name="postId" value="' + id + '" />')
        $('textarea[name=description]').removeClass('error');
        $('input[name=title]').removeAttr('disabled');
        $('textarea[name=description]').removeAttr('disabled');
        $('#postModal button[type=submit]').removeClass('d-none');

        $.ajax({
            url: `posts/${id}`,
            type: 'GET',
            success: function(response) {
                if (response && response.status === 'success') {
                    const data = response.data;
                    $('#postModal #modalTitle').text('Update Post');
                    $('#postModal input[name=title]').val(data.title);
                    $('#postModal textarea[name=description]').val(data.description);
                    $('#postModal').modal('toggle');
                }
            }
        })
    });

    // delete button click
    $('.btn-delete').click(function() {
        const id = $(this).data('id');

        if (id) {
            const result = window.confirm('Do you want to delete?');
            if (result) {
                $.ajax({
                    url: `posts/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        if (response && response.status === 'success') {
                            const data = response.data;
                            $(`#post_${data.id}`).remove();
                        }
                    }
                });
            } else {
                console.log('error', 'Post not found');
            }
        }
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
