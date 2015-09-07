@extends('admin.layout')

@section('content')

	<div class="table-responsive adminPosts">
	<table class="table">
		<thead>			
			<td> Content </td>
			<td> Name </td>
			<td> Date </td>
			<td>Approved</td>
			<td> Action </td>
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
@endsection