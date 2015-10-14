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
    <li> <a href="{{ url('/admin/users') }}" class="active"> <i class="icon-line-head"></i> All </a> </li>
    <li> <a href=""> <i class="icon-line-star"></i> Admins </a> </li>                    
    <li> <a href=""> <i class="icon-line-cross"></i> Banned </a> </li>            
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<table>
  <thead>
    <td>Name</td>
	<td>Email</td>
	<td>Status</td>
	<td>Banned</td>
	<td>User Level</td>
  </thead>
  <tbody>
  @foreach($users as $user)
	<tr>
		<td class="subTD"> {{$user->name}}</td>
		<td class="subTD">{{$user->email}}</td>
		<td class="subTD">
			@if($user->status == 1)
			<span style="color:green;">Active</span>
			@elseif($user->status == 2)
			<span style="color:green;">Active From Social Media</span>
			@else
			<span style="color:red;">Not Active</span>
			@endif
		</td>
		<td class="subTD">
			@if($user->banned == 0)
			<span style="color:green;">Not Banned</span>
			@else
			<span style="color:red;">Banned</span>
			@endif
		</td>
		<td class="subTD">
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