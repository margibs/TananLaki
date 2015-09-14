
@foreach ($users as $user) 
	{{$user->name}}
@endforeach

{!! $users->appends(Request::only('q'))->render() !!}