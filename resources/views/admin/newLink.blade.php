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
        <!-- <input id="featured_image" type='hidden' name='featured_image' value=''> -->
        <input type="text" name="url" value="{{old('url')}}" class="form-control newPost newPostBox" placeholder="Enter URL LINK here" />
        <br>
        <div id="editorcontainer" style="height:500px;border:1px solid #efefef;">
          <textarea name="description" id="editor1" rows="10" cols="80">{{old('description')}}</textarea>
        </div>
    </div>

    <div class="col_one_fourth col_last">
        

        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title" style="font-family: Lato;font-weight:500!important;">Image </h2>
            </div>
            <div class="panel-body" style="padding-top: 0;">
                <a href="#" data-toggle="modal" data-target="#myModal" style="display: block; margin: 10px; text-align: center;"> Image </a>   
                <input type="text" name="image" value="{{old('image')}}" placeholder="Link image url">
              <div id="img_here"></div>         
            </div>
        </div>
    <input type="text" name="website_url" value="{{old('website_url')}}" class="form-control newPost newPostBox" placeholder="Website Name" />
        <div class="panel panel-default">
          
            <div class="panel-body">
                    <div class="controls">

            <label class="checkbox" for="published">
                {!! Form::checkbox('visible', 1) !!}Visible
            </label>
         
          </div>
              <input type="submit" value="Submit" class="button button-3d">
            </div>
        </div>
</form>
    </div>
@endsection