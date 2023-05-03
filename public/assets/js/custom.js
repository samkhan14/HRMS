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


// ================ AJAX CRUD CODE FOR ROLES AS A TESTING ============
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Open Modal for create post
    $('#create-new-post').click(function() {
        $('#role-save').val("create-role");
        $('#rolesForm').trigger("reset");
        $('#postCrudModal').html("Add New Role");
        $('#ajax-roles-crud-modal').modal('show');
    });

    // EDIT ROLE
    $('body').on('click', '#edit-role', function() {
        var role_id = $(this).data('id');
        $.get('roles/' + role_id + '/edit', function(data) {
            $('#postCrudModal').html("Edit Role");
            $('#role-save').val("edit-role");
            $('#ajax-roles-crud-modal').modal('show');
            $('#role_id').val(data.id);
            $('#name').val(data.name);
        })
    });

    // DELETE ROLE
    $('body').on('click', '.delete-role', function() {
        var role_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: "/roles" + '/' + role_id,
            success: function(data) {
                $("#role_id_" + role_id).remove();
            },
            error: function(data) {
                console.log('Error:', data);
            }
        });
    });
});

// ADD NEW ROLE AND FETCH
if ($("#rolesForm").length > 0) {
    $("#rolesForm").validate({

        submitHandler: function(form) {
            var actionType = $('#role-save').val();
            $('#role-save').html('Sending..');

            $.ajax({
                data: $('#rolesForm').serialize(),
                url: "/roles",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    $('.textmsg').html("Data has been saved");
                    var post = '<tr id="role_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.created_at + '</td>';

                    post += '<td><div class="dropdown dropdown-action"><a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a><div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item roleUpdate" href="javascript:void(0)" id="edit-role" data-id="'+ data.id+'"><i class="fa fa-pencil m-r-5"></i> Edit</a><a href="javascript:void(0)" class="dropdown-item delete-role" id="delete-role" data-id="'+ data.id+'">Delete</a></div></div></td></tr>';


                    // post += '<td><a href="javascript:void(0)" id="edit-role" data-id="' + data.id + '" class="btn btn-info">Edit</a></td>';
                    // post += '<td><a href="javascript:void(0)" id="delete-role" data-id="' + data.id + '" class="btn btn-danger delete-role">Delete</a></td></tr>';


                    if (actionType == "create-role") {
                        $('#role-crud').prepend(post);
                    } else {
                        $("#role_id_" + data.id).replaceWith(post);
                    }

                    $('#rolesForm').trigger("reset");
                    $('#ajax-roles-crud-modal').modal('hide');
                    $('#role-save').html('Save Changes');

                },
                error: function(data) {
                    console.log('Error:', data);
                    $('#role-save').html('Save Changes');
                }
            });
        }
    })
}

// ==================== END AJAX CRUD CODE===================

