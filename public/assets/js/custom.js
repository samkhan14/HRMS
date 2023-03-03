// ================ AJAX CRUD CODE FOR POSTS AS A TESTING ============
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Open Modal for create post
    $('#create-new-post').click(function() {
        $('#btn-save').val("create-post");
        $('#postForm').trigger("reset");
        $('#postCrudModal').html("Add New post");
        $('#ajax-crud-modal').modal('show');
    });

    //
    $('body').on('click', '#edit-post', function() {
        var post_id = $(this).data('id');
        $.get('posts/' + post_id + '/edit', function(data) {
            $('#postCrudModal').html("Edit post");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#post_id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);
        })
    });
    $('body').on('click', '.delete-post', function() {
        var post_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "/posts" + '/' + post_id,
            success: function(data) {
                $("#post_id_" + post_id).remove();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
});

if ($("#postForm").length > 0) {
    $("#postForm").validate({

        submitHandler: function(form) {
            var actionType = $('#btn-save').val();
            $('#btn-save').html('Sending..');

            $.ajax({
                data: $('#postForm').serialize(),
                url: "/posts",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('.textmsg').html("Data has been saved");
                    var post = '<tr id="post_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.body + '</td>';
                    post += '<td><a href="javascript:void(0)" id="edit-post" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
                    post += '<td><a href="javascript:void(0)" id="delete-post" data-id="' + data.id + '" class="btn btn-danger delete-post">Delete</a></td></tr>';


                    if (actionType == "create-post") {
                        $('#posts-crud').prepend(post);
                    } else {
                        $("#post_id_" + data.id).replaceWith(post);
                    }

                    $('#postForm').trigger("reset");
                    $('#ajax-crud-modal').modal('hide');
                    $('#btn-save').html('Save Changes');

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#btn-save').html('Save Changes');
                }
            });
        }
    })
}

// ==================== END AJAX CRUD CODE===================

