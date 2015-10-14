@extends('admin.layout')

@section('content')

<div class="submenu">
                  
  <div class="searchform"> 
  <form action="">
    <a href=""> <i class="icon-angle-right"></i> </a>
    <input type="text" class="searchbox" />
  </form>
  </div>

  <ul>
    <li> <a href="{{ url('admin/comments') }}" class="active"> <i class="icon-line-speech-bubble"></i> All </a> </li>
    <li> <a href=""> <i class="icon-line-check"></i> Approved </a> </li>                    
    <li> <a href=""> <i class="icon-line-cross"></i> Unapproved </a> </li>
    <li> <a href=""> <i class="icon-trash"></i> Trash </a> </li>                  
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<table>
  <thead>
    <tr><td style="width: 3%;"> <input type="checkbox"> </td>
    <td style="width: 10%;"> Name </td>
	<td> Content </td>				
	<td style="width: 10%;"> Date </td>
	<td style="width: 3%;"> Approved</td>
	<td style="width: 35%;text-align: center;"> Post </td>
	<td> Action </td>
  </tr>
  </thead>
  <tbody>
  @foreach($comments as $comment)
		<tr>
		 	<td> <input type="checkbox"> </td>
			<td>{{$comment->name}}</td>
			<td>{{$comment->content}}</td>					
			<td style="text-align: center;">{{$comment->created_at}}</td>
			<td style="text-align: center;">
				@if($comment->approved == 0)
					<a href=""><i class="icon-thumbs-down"></i></a>
				@else
					<a href=""><i class="icon-thumbs-up"></i></a>
				@endif
			</td>
			<td> 
			<a href="{{ url('/') }}/{{ $comment->catslug }}/{{ $comment->slug }}" traget="_blank" style="font-size: 13px;">{{ url('/') }}/{{ $comment->catslug }}/{{ $comment->slug }}</a> </td>
			<td style="text-align: center;"><a href="#"><i class="icon-trash"></i></a></td>
		</tr>
	@endforeach	
  </tbody>
</table>

{!! $comments->render() !!}

@endsection