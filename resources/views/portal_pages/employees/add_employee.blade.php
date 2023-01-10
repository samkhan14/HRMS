@extends('portal_pages.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">ADD NEW EMPLOYEE</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">All EMPLOYEES</li>
					</ol>
				</div>
				<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>Total Employees</small></h6>
								<h4 class="m-t-0 text-info">
									{{--  --}}
								</h4>
							</div>
							<div class="spark-chart">
								<div id="monthchart"></div>
							</div>
						</div>
						<div class="">
							<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
						</div>
					</div>
				</div>
			</div>
            <div class="row">
            <div class="col-lg-12">
                <x-message />
            </div>
            </div>

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Employee User</h4>

				<form method="post" id="brandForm" name="brandForm" action="{{ url('/add-employee')}}" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input type="hidden" name="user_id" value="{{ $user_id }}">

                        <div class="row mb-3">
							<div class="col">
								<input type="text" name="fname" placeholder="First Name" class="form-control" >
							</div>
                            <div class="col">
								<input type="text" name="lname" placeholder="Last Name" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
								<input type="text" name="son_of" placeholder="Father's Name" class="form-control" >
							</div>
                            <div class="col">
								<input type="email" name="persnol_email" placeholder="Personal Email" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
								<input type="tel" name="age" placeholder="Age" class="form-control" >
							</div>
                            <div class="col">
								<input type="date" name="dob" placeholder="Date of Birth" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
								<input type="text" name="gender" placeholder="Gender" class="form-control" >
							</div>
                            <div class="col">
								<input type="text" name="city" placeholder="City" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
								<input type="text" name="address" placeholder="Address" class="form-control" >
							</div>
                            <div class="col">
								<input type="tel" name="persnol_number" placeholder="Personal Number" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
								<input type="text" name="marital_status" placeholder="Marital Status" class="form-control" >
							</div>
                             <div class="col">
								<input type="file" name="image[]" placeholder="Employee Image" class="form-control" >
							</div>
						</div>

                        <div class="row mb-3">
							{{-- <div class="col">
                                <select name="status" id="" class="form-control">
                                    <option  selected>Select Employee Status...</option>
                                    <option>Active</option>
                                    <option>Deactive</option>
                                </select>
							</div> --}}
                            <div class="col">
                                <input type="tel" name="salary" placeholder="Salary" class="form-control" >
							</div>
                            <div class="col">
								<select name="empType" id="" class="form-control">
                                    <option value="1" selected>Select Employee Type...</option>
                                    @foreach ($etypes as $etype )
                                    <option value="{{ $etype->id}}">{{ $etype->emp_type}}</option>
                                    @endforeach
                                </select>
							</div>
						</div>

                        <div class="row mb-3">
							<div class="col">
                                <select lect name="designation" id="" class="form-control">
                                    <option value="1" selected>Select Designation...</option>
                                    @foreach ($designation as $des)
                                    <option value="{{ $des->id}}" >{{ $des->des_title }}</option>
                                    @endforeach
                                </select>
							</div>
                            <div class="col">
								<select name="department" id="" class="form-control">
                                    <option value="1" selected>Select Department...</option>
                                   @foreach ($department as $dep)
                                   <option value="{{ $dep->id}}">{{ $dep->dep_name}}</option>
                                   @endforeach
                                </select>
							</div>
						</div>

						{{-- <div class="form-group">
							<label for="">Status</label>
							<select name="status" id="" class="form-control">
								<option value="1" selected>Active</option>
								<option value="0" >Deactive</option>
							</select>
						</div> --}}
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-success">Add</button>
					</div>
				</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="{{ url('/admin/main-assets/plugins/jquery/jquery.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

	<script>

        $('#dlt-des').click(function(){
            alert("are you sure");
        });

		// function previewFile(input){
		// 	var file = $("input[type=file]").get(0).files[0];

		// 	if(file){
		// 		var reader = new FileReader();

		// 		reader.onload = function(){
		// 			$("#previewImg").attr("src", reader.result);
		// 		}

		// 		reader.readAsDataURL(file);
		// 	}
		// }

		// $(document).on('change', '#search_parent_category', function(){
		// 	var cat_id = $(this).val();
		// 	$.ajax({
		// 		url: '{{ url("/get_sub_parent_categories") }}/'+cat_id,
		// 		type: 'get',
		// 		success: function(response){
		// 			var html = "";
		// 			html += '<option value="All" selected>Select sub parent category</option>';
		// 			$.each(response, function(index, val) {
		// 				if(val.id==response['sub_parent_category_id']){
		// 					html += "<option value='"+ val.id +"' selected>"+val.name +"</option>";
		// 				}else{
		// 					html += "<option value='"+ val.id +"' >"+val.name +"</option>";
		// 				}
		// 			});
		// 			$('#search_sub_parent_category').html(html);
		// 		}
		// 	});
		// });

		// //get all products
		// $(document).ready(function(){
		// 	fetchAll(null,null,null,null);
		// 	$('#searchBtn').on('click',(function(e) {
		// 		var search_product_name = $('#search_product_name').val();
		// 		var search_parent_category = $('#search_parent_category').val();
		// 		var search_sub_parent_category = $('#search_sub_parent_category').val();
		// 		var searched_by_status = $('#search_product_status').val();
		// 		fetchAll(search_product_name, search_parent_category, search_sub_parent_category, searched_by_status);
		// 	}));

		// 	function fetchAll(name, parent_category_id, sub_parent_category_id, status){
		// 		$.ajax({
		// 			url: '{{ url("/get_all_products") }}',
		// 			type: 'post',
		// 			data: {'name':name, 'parent_category_id':parent_category_id, 'sub_parent_category_id':sub_parent_category_id, 'status':status},
		// 			headers: {
		// 				'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
		// 			},
		// 			success: function(response){
		// 				createRows(response);
		// 				// console.log(response);
		// 			}
		// 		});
		// 	}
		// });

		// // // Create table rows
		// function createRows(response){
		// 	var len = 0;
		// 	$('#all_record tbody').empty(); // Empty <tbody>
		// 	if(response['data'] != null){
		// 		len = response['data'].length;
		// 	}

		// 	if(len > 0){
		// 		for(var i=0; i<len; i++){
		// 			var id = response['data'][i].id;
		// 			var image = response['data'][i].image;
		// 			var parent_category = response['data'][i].has_parent_category.name;
		// 			var sub_parent_category_id = response['data'][i].has_sub_parent_category.name;
		// 			var name = response['data'][i].name;
		// 			var unit_price = response['data'][i].unit_price;
		// 			var purchase_price = response['data'][i].purchase_price;
		// 			var status = response['data'][i].status;
		// 			var path = "{{ asset('/images/product_images') }}/"+image;
		// 			var tr_str = "<tr id='tr-remove"+id+"'>" +
		// 				"<td>" + (i+1) + "</td>" +
		// 				"<td> <img src='"+path+"' width='40px' /></td>" +
		// 				"<td>" + parent_category + "</td>" +
		// 				"<td>" + sub_parent_category_id + "</td>" +
		// 				"<td>" + name + "</td>" +
		// 				"<td>" + unit_price + "</td>" +
		// 				"<td>" + purchase_price + "</td>";
		// 				if(status==1){
		// 					tr_str +="<td><span class='label label-success'>Active</span></td>";
		// 				}else{
		// 					tr_str +="<td><span class='label label-danger'>Deactive</span></td>";
		// 				}
		// 				tr_str += "<td>"+
		// 					"<a href='{{ url('/product') }}/"+id+"/edit' class='btn btn-sm btn-icon btn-warning' id='edit-btn' value='"+id+"' data-toggle='tooltip' title='Update Product'><i class='mdi mdi-border-color'></i></a>"+
		// 					"<a  onclick='deleteData("+id+")' class='btn btn-sm btn-icon btn-danger' style='color:#fff; margin-left:5px'  data-toggle='tooltip' title='Delete Category'><i class='fa fa-trash-alt'></i></a>"+
		// 				"</td>";
		// 				tr_str += "<td>  </td>" +
		// 			"</tr>";

		// 			$("#all_record tbody").append(tr_str);
		// 		}
		// 	}else{
		// 		var tr_str = "<tr>" +
		// 			"<td align='center' colspan='8'>No record found.</td>" +
		// 		"</tr>";

		// 		$("#all_record tbody").append(tr_str);
		// 	}
		// }
		// /* Categories Get With Search  */

		// /* Delete Banner */
		// function deleteData(id) {
		// 	swal({title:"",
		// 		text:"Are you sure you want to delete?",icon:"error",
		// 		buttons:{cancel:{text:"Cancel",value:null,visible:!0,className:"btn btn-default",closeModal:!0},
		// 			confirm:{text:"Delete",value:!0,visible:!0,className:"btn btn-danger",closeModal:!0}}
		// 	}).then(function(isConfirm) {
		// 		if (isConfirm) {
		// 			$.ajax({
		// 				type:"delete",
		// 				url:"{{ url('product') }}/"+id,
		// 				headers: {
		// 					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
		// 				},
		// 				success:function(data){
		// 					if(data==true){
		// 						$('#tr-remove'+id).fadeOut(500);
		// 						swal({title:"Successfully!",text:"Brand deleted successfully",icon:"success",timer:2000});
		// 					}
		// 				},
		// 				error:function (er) {
		// 					$.gritter.add({title:"Something went wrong!",text:"",sticky:!1,time:3000});
		// 				}
		// 			});
		// 		}
		// 	});
		// }
	</script>
@endsection
