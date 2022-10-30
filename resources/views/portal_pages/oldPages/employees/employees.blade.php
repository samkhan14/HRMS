@extends('portal_pages.layout.master')
@section('content')

	<div class="page-wrapper">
		<div class="container-fluid">
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">All EMPLOYEES</h3>
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
			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-12">
					<div class="row col-md-12">
						<div class="col-md-3" style="margin-bottom: 10px;">
							<div class="search-field">
								<input type="text" class="form-control" name="" id="search_product_name" placeholder="Search Employee Name">
							</div>
						</div>


						<div class="search-field col-sm-3">
							<select name="" id="search_product_status" class="select2" style="width: 100%">
								<option value="All">All Status </option>
								<option value="1">Active </option>
								<option value="2">Inactive</option>
							</select>
						</div>

						<div class="search-button" style="float:right;">
							<button type="submit" id="searchBtn" class="btn btn-info">Search</button>
							<!-- <button type="button" id="" class="btn btn-success">Add Product</button> -->
							{{-- <button href="#" class="btn btn-success" data-toggle="modal" data-target="#add-artist">Add Employee</button> --}}

                        </div>
					</div>
				</div>
			</div>

            @if (session()->has('success'))
            <div class="alert alert-success">
                @if(is_array(session('success')))
                    <ul>
                        @foreach (session('success') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @else
                    {{ session('success') }}
                @endif
            </div>
            @endif

			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">All Employees</h4>
						<div class="table-responsive">
							<table class="table" id="all_record">
								<thead>
									<tr>
										<th>Employee Id</th>
										<th>employee name</th>
                                        <th>Father's Name</th>
                                        <th>persnol email</th>
                                        <th>Date of Birth</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Personal No</th>
                                        <th>Marital Status</th>
                                        <th>Image</th>
                                        <th>status</th>
                                        <th>salary</th>
                                        <th>Employee Type</th>
                                        <th>Designation</th>
                                        <th>Department</th>
                                        <th>Office email</th>
                                        <th>joining date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>

								@foreach($all_employees as $all_emps)
                                {{-- @dd($all_emps) --}}
								<tr>
								<td>{{$all_emps->user_id}}</td>
								<td>{{$all_emps->fname}} {{$all_emps->lname}}</td>
								<td>{{$all_emps->son_of}}</td>
								<td>{{$all_emps->persnol_email}}</td>
								<td>{{$all_emps->dob}}</td>
								<td>{{$all_emps->city}}</td>
								<td>{{$all_emps->address}}</td>
								<td>{{$all_emps->persnol_number}}</td>
								<td>{{$all_emps->marital_status}}</td>
								<td><img src="{{asset('admin/Uploads/Empoyee_images/'.$all_emps->image)}}" width="100%" alt="employee img"></td>
								<td>1</td>
								<td>{{$all_emps->salary}}</td>
								<td>{{isset($all_emps->empType->emp_type)?$all_emps->empType->emp_type:'N/A'}}</td>
								<td>{{$all_emps->designation->des_title}}</td>
								<td>{{$all_emps->department->dep_name}}</td>
								<td>{{isset($all_emps->userinfo->email)?$all_emps->userinfo->email:'N/A'}}</td>
								<td>{{isset($all_emps->userinfo->created_at)?$all_emps->userinfo->created_at:'N/A'}}</td>
								<td>
                                    <a href="{{ url('edit/employee/'.$all_emps->id)}}" class="btn btn-sm btn-icon btn-warning edit" data-toggle="tooltip" title="" data-original-title="Update Designation"><i class="mdi mdi-border-color"></i></a>
                                </td>
                                <td>
                                        <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="dlt-des" class="btn btn-sm btn-danger mdi mdi-border-color" type="submit"></button>
                                        </form>
                                    </td>

							</tr>
								@endforeach
								</tbody>
							</table>
                            {{-- <div class="d-flex justify-content-center">
                                {!! $get_designations->links() !!}
                            </div> --}}

							<div>
							</div>
						</div>
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
