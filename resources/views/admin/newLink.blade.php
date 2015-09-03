@extends('admin.layout')

@section('content')

    
    <h2 class="adminTitle"> Add New Link </h2> 
    
    
    <div class="clearfix"></div>

    <div class="col_three_fourth">

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ url('admin/new_link') }}" enctype="multipart/form-data">
        {!! csrf_field() !!}
        
          <div class="form-group">
            <label for="exampleInputEmail1"> Image URL </label>
            <input type="text" class="form-control" name="image" value="{{old('image')}}"  id="exampleInputEmail1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"> Ad Link URL </label>
            <input type="text" class="form-control" name="url"  value="{{old('url')}}"  id="exampleInputEmail1" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> Ad Title </label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="">
          </div>          
          <div class="form-group">
            <label for="exampleInputPassword1"> Ad URL Caption</label>
            <input type="text" name="website_url" value="{{old('website_url')}}"  class="form-control newPost" id="exampleInputPassword1" placeholder="">
          </div>          
          <label class="checkbox" for="published">
                {!! Form::checkbox('visible', 1) !!}Visible
          </label>
          
          <input type="submit" value="Submit" class="button button-3d">

      <!--   <input type="text" name="url" class="form-control newPost" placeholder="Enter URL LINK here" />

        <input type="text" name="" value="{{old('description')}}" />  -->
        <!-- <br>
          <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="description" id="editor1" rows="10" cols="80">{{old('description')}}</textarea>
        </div> -->
    </div>


</form>
    </div>
@endsection