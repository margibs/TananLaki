@extends('admin.layout')

@section('content')

<h2 class="adminTitle"> General Settings </h2> 
<div class="clearfix"></div>
<div class="col_half">
        <div id="contentMainWrapper" style="padding:20px;">
			<form action="">
				{!! csrf_field() !!}
				
			 <div class="form-group">
                <label for="site_name">Site name</label>        
                <input type="text" class="form-control" name='site_name' value=''>
             </div>

             <div class="form-group">
                <label for="site_name">Tag Line</label>        
                <input type="text" class="form-control" name='tagline' value=''>
             </div>

             <div class="form-group">                 
                <input type="checkbox"  name="comment_approve" value="1">
                <label for="comment_approve">Approved Comments</label> 
                <div class="clearfix"></div>     
				<input type="submit" value="Submit" class="button button-3d" style="margin-left: 0;">
             </div>
				
			</form>
		</div>

</div>

@endsection