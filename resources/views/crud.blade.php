<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta  name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
          <button type="button" class="btn btn-primary" id="add_todo">  Add Todo </button>
          <table class="table table-bordered">
              <thead>
                  <th>Sr.no</th>
                  <th>Name</th>
                  <th>Action</th>
              </thead>
              <tbody id="list_todo">
                  @foreach($crud as $crd)
                    <tr id="row_todo_{{ $crd->id}}">
                        <td>{{ $crd->id}}</td>
                        <td>{{ $crd->dep_name}}</td>
                        <td>
                            <button type="button" id="edit_todo" data-id="{{ $crd->id }}" class="btn btn-sm btn-info ml-1">Edit</button>

                            <button type="button" id="delete_todo" data-id="{{ $crd->id }}" class="btn btn-sm btn-danger ml-1">Delete</button>
                        </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>

          <!-- The Modal -->
          <div class="modal" id="modal_todo">
            <div class="modal-dialog">
              <div class="modal-content">
                <form id="form_todo">
                    <div class="modal-header">
                      <h4 class="modal-title" id="modal_title"></h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      <input type="hidden" name="id" id="id">
                      <input type="text" name="name" id="name_todo" class="form-control" placeholder="Enter todo ...">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-info">Submit</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>

              </div>
            </div>
          </div>

        </div>

        <script type="text/javascript">

            $(document).ready(function(){
                $.ajaxSetup({
                    headers:{
                        'x-csrf-token' : $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });



            $("#add_todo").on('click',function(){
                $("#form_todo").trigger('reset');
                $("#modal_title").html('Add todo');
                $("#modal_todo").modal('show');
            });

            $("body").on('click','#edit_todo',function(){
                var id = $(this).data('id');
                $.get('todos/'+id+'/edit',function(res){
                    $("#modal_title").html('Edit Todo');
                    $("#id").val(res.id);
                    $("#name_todo").val(res.name);
                    $("#modal_todo").modal('show');
                });
            });

            // Delete Todo
            $("body").on('click','#delete_todo',function(){
                var id = $(this).data('id');
                confirm('Are you sure want to delete !');

                $.ajax({
                    type:'DELETE',
                    url: "todos/destroy/" + id
                }).done(function(res){
                    $("#row_todo_" + id).remove();
                });
            });

            //save data

            // $("form").on('submit',function(e){
            //     e.preventDefault();
            //     $.ajax({
            //         url:"todos/store",
            //         data: $("#form_todo").serialize(),
            //         type:'POST'
            //     }).done(function(res){
            //         var row = '<tr id="row_todo_'+ res.id + '">';
            //         row += '<td>' + res.id + '</td>';
            //         row += '<td>' + res.name + '</td>';
            //         row += '<td>' + '<button type="button" id="edit_todo" data-id="' + res.id +'" class="btn btn-info btn-sm mr-1">Edit</button>' + '<button type="button" id="delete_todo" data-id="' + res.id +'" class="btn btn-danger btn-sm">Delete</button>' + '</td>';

            //         if($("#id").val()){
            //             $("#row_todo_" + res.id).replaceWith(row);
            //         }else{
            //             $("#list_todo").prepend(row);
            //         }

            //         $("#form_todo").trigger('reset');
            //         $("#modal_todo").modal('hide');

            //     });
            // });



        </script>
    </body>
</html>
