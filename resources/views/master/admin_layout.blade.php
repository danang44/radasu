<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>E-Comerce</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../../../../global_assets/js/main/jquery.min.js"></script>
	<script src="{{asset('./global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="../../../../global_assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="../../../../global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="../../../../global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="../../../../global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="../../../../global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="../../../../global_assets/js/plugins/pickers/daterangepicker.js"></script>

	<script src="{{asset('assets/js/app.js') }}"></script>
	<script src="../../../../global_assets/js/demo_pages/dashboard.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/streamgraph.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/sparklines.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/lines.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/areas.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/donuts.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/bars.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/progress.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/heatmaps.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/pies.js"></script>
	<script src="../../../../global_assets/js/demo_charts/pages/dashboard/dark/bullets.js"></script>
	<!-- /theme JS files -->
	<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
</head>

<body>

	<!-- Main navbar -->
	@include('layouts_admin.nav')
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<!-- @include('layouts_admin.sidebar') -->
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->

			<!-- bagian konten biasanya di atasnya tulisan produk -->
			<div class="page-header border-bottom-0">




			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">



				<!-- Dashboard content -->
				@yield('content')
				<!-- ngisi konten disini  -->



				<!-- /dashboard content -->

			</div>
			<!-- /content area -->


			<!-- Footer -->
			@include('layouts_admin.footer')
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>

</html>