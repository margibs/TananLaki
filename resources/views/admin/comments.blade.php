@extends('admin.layout')

@section('content')
<h2 class="adminTitle"> <i class="icon-line-speech-bubble"></i> Comments </h2> 
<div id="contentMainWrapper">
		<div class="table-responsive adminPosts">
		<table class="table table-striped">
			<thead>			
				<th> Content </th>
				<th> Name </th>
				<th> Date </th>
				<th>Approved</th>
				<th> Action </th>
			</thead>
			<tbody>
			@foreach($comments as $comment)
				<tr>
					<td>{{$comment->content}}</td>
					<td>{{$comment->name}}</td>
					<td>{{$comment->created_at}}</td>
					<td>
						@if($comment->approved == 0)
							Not Approved
						@else
							Approved
						@endif
					</td>
					<td>Delete</td>
				</tr>
			@endforeach	
			</tbody>
		</table>

		{!! $comments->render() !!}
	</div>
</div>
@endsection