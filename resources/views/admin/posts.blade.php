
@extends('admin.layout')

@section('content')
	
<h2 class="adminTitle">
<i class="icon-line-paper-stack"></i>  {{$post_name}}
<a href="{{ url('/admin/new_post') }}"> <i class="icon-plus-sign"></i> Add new </a>
<a href="{{ url('/admin/posts') }}"> <i class="icon-paperclip"></i> Posts </a>
<a href="{{ url('/admin/drafts') }}"> <i class="icon-line-marquee"></i> Drafts </a>

<!-- <a href="{{ url('/admin/new_post') }}" class="button button-3d button-large button-rounded" style="  position: relative; top: -7px; margin-left: 10px;"> Add New <i class="icon-line-circle-plus"></i> </a>   -->
</h2>
<div class="clearfix"></div>

<!-- <div class="inlinedList">
	<ul class="list-inline" style="margin-left: 20px;margin-bottom: 20px;">
	    <li><a href=""><div> <i class="icon-paperclip"></i> All </div></a> </li>	    
	    <li><a href=""><div> <i class="icon-line-marquee"></i> Drafts </div></a> </li> 
	</ul>
</div> -->
	

<div id="contentMainWrapper">

	<div class="table-responsive adminPosts">
		<table class="table table-striped">
			<thead>			
			
				<th> Title </th>
				<th> Categories </th>
				<!-- <td> Comments </td> -->
				<th> Date </th>
				<th> Action </th>
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