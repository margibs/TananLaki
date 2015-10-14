@extends('admin.layout')

@section('content')

<style>
  .right table tbody tr td{
    padding-top: 20px;
  }
</style>
  
<div class="submenu">
                  
                  <div class="searchform"> 
                  <form action="">
                    <a href=""> <i class="icon-angle-right"></i> </a>
                    <input type="text" class="searchbox" />
                  </form>
                  </div>

                  <ul>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-line-square-plus"></i> New Category </a> </li>
                    <li> <a href="{{ url('admin/categories') }}"> <i class="icon-paperclip"></i> All </a> </li>                    
                    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
                  </ul>
                </div>

                <div class="row">
                  
                  <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                      <div class="panel">
                        <h6> Add new category </h6>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif                        

                        <div class="categform">
                          <form class="form-inline" method="POST" action="{{ url('admin/categories') }}">
                             {!! csrf_field() !!}  
                            <div class="form-group">                            
                              <input type="text" name="name"  value="{{ old('name') }}">
                            </div>
                            <input type="submit" value="Submit">
                          </form>
                        </div>

                      </div>
                  </div>

                  <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                      <table>
                        <thead>
                          <td style="width: 6%;"> <input type="checkbox"> </td>
                          <td> Category </td>
                          <td> Slug </td>
                          <td> Action </td>                    
                        </thead>
                        <tbody>

                       @foreach($categories as $category)
                            <tr>            
                              <td> <input type="checkbox"> </td>                                
                              <td> <a href="#">{{$category->name}}</a> </td>                                          
                              <td class="subTD">{{$category->slug}}  </td>    
                              <td> <a href=""> <i class="icon-line-trash"></i> </a> </td>                          
                            </tr>
                        @endforeach
                      
                        </tbody>
                      </table>

                  </div>


                </div>

   


@endsection



