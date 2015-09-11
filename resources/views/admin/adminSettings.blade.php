@extends('admin.layout')

@section('content')
	
	<br /><br><br><br>
	<div id="contentMainWrapper">
		<form action="">
			{!! csrf_field() !!}

			<label for="site_name">Site name</label>
			<input type="text" name="site_name"><br>
			<label for="tagline">Tag Line</label>
			<input type="text" name="tagline"><br>

			<label for="comment_approve">Approved Comments</label>
			<input type="checkbox" name="comment_approve" value="1"><br>

			<input type="text" class="btn btn-primary" value="Save">
			
		</form>
	</div>

@endsection