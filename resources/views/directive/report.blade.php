@extends('layouts.directive')
	@section('content')
	<div class="row">
		<div class="container">
			<div class="col-md-10">
				<div class="col-md-12" >
					<canvas id="canvas"></canvas>
				</div>
			</div>
		</div>
	</div>
	@endsection

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
    <script src="/js/directive-report.js"></script>