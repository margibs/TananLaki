
@extends('admin.layout')

@section('content')
	
	
	<h2 class="adminTitle"> Drafts </h2>
	<div id="contentMainWrapper">
		<div class="clearfix"></div>
		<div class="table-responsive adminPosts">
			<table class="table table-striped">
				<thead>			
					<td> Title </td>
					<td> Categories </td>
					<!-- <td> Comments </td> -->
					<td> Date </td>
					<td> Action </td>
				</thead>
				<tbody>

					<tr>
						<td> <a href=""> </a> </td>
						<td class="subTD">
			
						</td> 
						<td class="subTD">   </td>
						<td><a href=""><i class="icon-trash2 trash"></i></a></td>

					</tr>

				</tbody>
			</table>
		</div>
	</div>

@endsection