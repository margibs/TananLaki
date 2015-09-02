@extends('admin.layout')

@section('content')

<h2 class="adminTitle"> Users </h2> 
<table class="table">
	<thead>			
		<th>Name</th>
		<th>Email</th>
		<th>Status</th>
		<th>Banned</th>
		<th>User Level</th>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
			<td>{{$user->email}}</td>
			<td>
				@if($user->status == 1)
				<span style="color:green;">Active</span>
				@elseif($user->status == 2)
				<span style="color:green;">Active From Social Media</span>
				@else
				<span style="color:red;">Not Active</span>
				@endif
			</td>
			<td>
				@if($user->banned == 0)
				<span style="color:green;">Not Banned</span>
				@else
				<span style="color:red;">Banned</span>
				@endif
			</td>
			<td>
				@if($user->is_admin == 1)
				<span style="color:green;">Admin</span>
				@elseif($user->is_admi == 0)
				<span style="color:green;">User</span>
				@else
				<span style="color:green;">Writer</span>
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

@endsection