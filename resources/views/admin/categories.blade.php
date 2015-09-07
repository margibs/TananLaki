@extends('admin.layout')

@section('content')
    
    <style>
      @media (max-width: 991px){
          .col_three_fourth{
              margin-top: 20px;
          }
      }
    </style>

    <div class="col_full">
                     <div class="rateEntryBox">
                        <h2 class="adminTitle"> 
                            <i class="icon-line-layers"></i> Categories
                        </h2> 
             

                    </div>
    
                 


                 
                  <!--   <form class="form-inline">
                              <div class="form-group">
                                    <select class="form-control">
                                      <option> Select Action </option>
                                      <option> Delete </option>
                                    </select>
                                    <input type="submit" value="Apply" class="btn"  />
                              </div>
                    </form>
                         -->
              <div class="col_one_third">
                <div id="contentMainWrapper" style="padding: 10px 20px;">
                        
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <h2 style="    
    margin-bottom: 15px;
    font-size: 20px;
    margin-top: 19px;"> <i class="icon-plus-sign"></i> Add New</h2>

                        <form class="form-inline" method="POST" action="{{ url('admin/categories') }}">
                           {!! csrf_field() !!}  
                          <div class="form-group">                            
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Add Category...">
                          </div>
                          <button type="submit" class="btn">Save</button>
                        </form>

                </div>   
              </div>

              <div class="col_two_thirdcol_last">
                <div id="contentMainWrapper">
                          <div class="table-responsive adminPosts">
                              <table class="table table-striped">
                                  <thead>                                    
                                      <th> Category </th>                                   
                                      <th> Slug </th> 
                                      <!-- <td> Count </td> -->
                                  </thead>
                                  <tbody>
                                     @foreach($categories as $category)
                                          <tr>                                            
                                              <td> <a href="#">{{$category->name}}</a> </td>                                          
                                              <td class="subTD">{{$category->slug}}  </td>
                                              <!-- <td class="subTD"> 10 </td> -->
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                </div>
              </div>                        

    </div>

@endsection



