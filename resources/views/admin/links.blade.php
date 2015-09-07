
@extends('admin.layout')

@section('content')
	
	
	<h2 class="adminTitle"> <i class="icon-link"></i> Links <a href="{{ url('admin/new_link') }}" class="button button-3d button-large button-rounded" style="  position: relative; top: -7px; margin-left: 10px;"> Add New <i class="icon-line-circle-plus"></i> </a>  </h2>
	<div class="clearfix"></div>
	   <div id="contentMainWrapper">
              <div class="table-responsive adminPosts">
                  <table class="table table-striped">
					<thead>
						<th> <input type="checkbox" /> </th>
						<th> URL </th>
						<th> Image </th>
						<th> Description </th>
						<th> Website Name </th>
						<th> Visible </th>
						<th> Date </th>
					</thead>
					<tbody>
					@foreach($links as $link)
						<tr>
							<td> <input type="checkbox" /> </td>
							<td> <a href="{{url('admin/edit_link')}}/{{$link->id}}">{{$link->url}}</a> </td>
							<td class="subTD">{{$link->image}}</td> 
							<td>{{$link->description}}</td>
							<td>{{$link->website_url}}</td>
							<td>@if($link->visible == 1) yes @else no @endif</td>
							<td class="subTD">  {{ date( 'jS F Y', strtotime($link->created_at) ) }}  </td>
						</tr>
					@endforeach	
					</tbody>
				</table>
			</div>
	</div>


@endsection