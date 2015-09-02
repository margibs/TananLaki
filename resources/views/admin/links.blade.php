
@extends('admin.layout')

@section('content')
	
	
	<h2 class="adminTitle"> Links <a href="{{ url('/admin/new_link') }}" class="button button-3d button-large button-rounded" style="  position: relative; top: -7px; margin-left: 10px;"> Add New <i class="icon-line-circle-plus"></i> </a>  </h2>
	<div class="clearfix"></div>
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<td> <input type="checkbox" /> </td>
			<td> URL </td>
			<td> Image </td>
			<td> Description </td>
			<td> Visible </td>
			<td> Date </td>
		</thead>
		<tbody>
		@foreach($links as $link)
			<tr>
				<td> <input type="checkbox" /> </td>
				<td> {{$link->url}} </td>
				<td class="subTD">{{$link->image}}</td> 
				<td>{{$link->description}}</td>
				<td>@if($link->visible == 1) yes @else no @endif</td>
				<td class="subTD">  {{ date( 'jS F Y', strtotime($link->created_at) ) }}  </td>
			</tr>
		@endforeach	
		</tbody>
	</table>
</div>


@endsection