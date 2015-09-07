
@extends('admin.layout')

@section('content')
	
<h2 class="adminTitle"> {{$post_name}} <a href="{{ url('/admin/new_post') }}" class="button button-3d button-large button-rounded" style="  position: relative; top: -7px; margin-left: 10px;"> Add New <i class="icon-line-circle-plus"></i> </a>  </h2>
<div class="clearfix"></div>

<div id="contentMainWrapper">
	<div class="table-responsive adminPosts">
		<table class="table">
			<thead>			
				<td> Title </td>
				<td> Categories </td>
				<!-- <td> Comments </td> -->
				<td> Date </td>
				<td> Action </td>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td> <a href="{{url('admin/posts')}}/{{$post->id}}"> {{$post->title}} </a> </td>
					<td class="subTD">
					@foreach($post->categories as $category)
						{{$category->name}}
					@endforeach
					</td> 
					<td class="subTD">  {{ date( 'jS F Y', strtotime($post->created_at) ) }}  </td>
					<td><a href="{{url('admin/posts')}}/{{$post->id}}/delete"><i class="icon-trash2 trash"></i></a></td>

				</tr>
			@endforeach	
			</tbody>
		</table>

		{!! $posts->render() !!}
	</div>
</div>


@endsection