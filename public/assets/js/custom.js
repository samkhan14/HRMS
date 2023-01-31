// save designation via ajax
$('#saveDesignation').on('submit', function(e){
    e.preventDefault();

    var designationName = $('#des_title').val();
   // console.log(designationName)
   $.ajaxSetup({
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });

    $.ajax({
        url:"{{route('designations.store')}}",
        type:"POST",
        dataType:"json",
        data:$("#saveDesignation").serialize(),
        success:function(data){
            console.log("Added", data)
             $('#add_designation').modal('hide');
             $('#alertmsg').html(data);
        },
        error:function(data){
            console.log("Error", data)
        }
    })
});
