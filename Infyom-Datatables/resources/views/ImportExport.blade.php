@extends('layouts.app')
@section('content')
<!-- <section class="content-header">
	<h1 class="pull-left">Gerai</h1>
</section> -->
<div class="content">
	<div class="clearfix"></div>	
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>Import / Export</strong></h3>
		</div>
		<div class="panel-body">

			@if ($message = Session::get('success'))
			<div class="alert alert-success" role="alert">
				{{ Session::get('success') }}
			</div>
			@endif

			@if ($message = Session::get('error'))
			<div class="alert alert-danger" role="alert">
				{{ Session::get('error') }}
			</div>
			@endif

			<h3>Import File Form:</h3>
			<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('ambildata') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

				<input type="file" name="import_file" />
				{{ csrf_field() }}
				<br/>

				<button class="btn btn-primary">Import Excel File</button>
				

			</form>
			<div style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;"> 		
				<a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-success btn-lg">Download Excel xls</button></a>
				<a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-success btn-lg">Download Excel xlsx</button></a>
				<a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-success btn-lg">Download CSV</button></a>
			</div>
			<br/>
		</div>
	</div>
</div>
@endsection