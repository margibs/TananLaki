@extends('admin.layout')

@section('content')
<h2 class="adminTitle"> <i class="icon-line-speech-bubble"></i> Comments </h2> 
	<div class="commentsSubLinks">
		<ul class="list-inline">
			<li> <a href="" class="active"> <i class="icon-comments"></i> All </a> </li>
			<li> <a href=""> <i class="icon-line2-like"></i> Approved</a>  </li>
			<li> <a href=""> <i class="icon-line2-dislike"></i> Unapproved</a>  </li>
			<li> <a href=""> <i class="icon-trash"></i> Trash</a>  </li>
		</ul>
	</div>		
<div id="contentMainWrapper">

		<div class="table-responsive adminPosts">
		<table class="table table-striped">
			<thead>			
				<th style="width: 10%;"> Name </th>
				<th> Content </th>				
				<th> Date </th>
				{{-- <th> Approved</th> --}}
				<th> Post </th>
				<th> Action </th>
			</thead>
			<tbody>
			@foreach($comments as $comment)
				<tr>
					<td class="subTD">{{$comment->name}}</td>
					<td class="subTD">{{$comment->content}}</td>					
					<td class="subTD">{{$comment->created_at}}</td>
{{-- 					<td class="subTD">
						@if($comment->approved == 0)
							<a href=""><i class="icon-thumbs-down"></i></a>
						@else
							<a href=""><i class="icon-thumbs-up"></i></a>
						@endif
					</td> --}}
					<td class="subTD" style="width: 30%;"> 
					<a href="{{ url('/') }}/{{ $comment->catslug }}/{{ $comment->slug }}" traget="_blank" style="font-size: 13px;">{{ url('/') }}/{{ $comment->catslug }}/{{ $comment->slug }}</a> </td>
					<td class="subTD"><a href="#"><i class="icon-trash"></i></a></td>
				</tr>
			@endforeach	
			</tbody>
		</table>

		{!! $comments->render() !!}
	</div>
</div>
@endsection