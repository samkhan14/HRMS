@extends('portal_pages.layout.master')
@section('content')
	<!-- ============================================================== -->
	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<div class="row page-titles">
				<div class="col-md-5 col-8 align-self-center">
					<h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
				</div>
				<!--<div class="col-md-7 col-4 align-self-center">
					<div class="d-flex m-t-10 justify-content-end">
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>THIS MONTH</small></h6>
								<h4 class="m-t-0 text-info">$58,356</h4></div>
							<div class="spark-chart">
								<div id="monthchart"></div>
							</div>
						</div>
						<div class="d-flex m-r-20 m-l-10 hidden-md-down">
							<div class="chart-text m-r-10">
								<h6 class="m-b-0"><small>LAST MONTH</small></h6>
								<h4 class="m-t-0 text-primary">$48,356</h4></div>
							<div class="spark-chart">
								<div id="lastmonthchart"></div>
							</div>
						</div>
						<div class="">
							<button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
						</div>
					</div>
				</div>-->

                @if(Session::has('flash_message_error'))
                <div class="alert alert-error">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ session('flash_message_error') }}</strong>
                </div>
              @endif

              @if(Session::has('flash_message_success'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong> {{ session('flash_message_success') }}</strong>
                </div>
              @endif

			</div>
			<!-- ============================================================== -->
			<!-- End Bread crumb and right sidebar toggle -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<div class="row">
				<!-- Column -->
				<div class="col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-info">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card fill-white feather-lg"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0">249</h3>
									<h6 class="text-muted mb-0">Spirituality Requests</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->
				<!-- Column -->
				<div class="col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-warning">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-monitor fill-white feather-lg"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0">276</h3>
									<h6 class="text-muted mb-0">Education Requests</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->
				<!-- Column -->
				<div class="col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex align-items-center justify-content-center rounded-circle bg-primary">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag fill-white feather-lg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0">195</h3>
									<h6 class="text-muted mb-0">Lifestyle  Requests</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->
				<!-- Column -->
				<div class="col-lg-3 col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-row">
								<div class="round round-lg text-white d-flex justify-content-center align-items-center rounded-circle bg-danger">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield fill-white feather-lg"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
								</div>
								<div class="ms-2 align-self-center">
									<h3 class="mb-0">67</h3>
									<h6 class="text-muted mb-0">Family  Requests</h6>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Column -->
			</div>
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<script src="https://code.highcharts.com/highcharts.js"></script>
							<script src="https://code.highcharts.com/modules/exporting.js"></script>
							<script src="https://code.highcharts.com/modules/export-data.js"></script>
							<script src="https://code.highcharts.com/modules/accessibility.js"></script>

						</div>
					</div>
				</div>
			</div>
			<!-- ============================================================== -->
			<!-- End PAge Content -->
			<!-- ============================================================== -->
		</div>
	</div>
@endsection
