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
    <li> <a href="{{ url('/admin/new_post') }}"> <i class="icon-line-square-plus"></i> Blog Post </a> </li>
    <li> <a href="{{ url('/admin/lol_post') }}"> <i class="icon-line2-emoticon-smile"></i> LOL Post </a> </li>                    
    <li> <a href="{{ url('/admin/posts') }}"  @if(Request::is('admin/posts*')) class="active" @endif> <i class="icon-paperclip"></i> All </a> </li>
    <li> 
      <a href="{{ url('/admin/drafts') }}" 
       @if(Request::is('admin/drafts*')) class="active" @endif
      > <i class="icon-line-marquee"></i> Draft </a>
    </li>
    <li> <a href="{{ url('/admin/trash') }}"  @if(Request::is('admin/trash*')) class="active" @endif > <i class="icon-trash"></i> Trash </a> </li>                    
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<table>
  <thead>
    <td>
      <input name="" type="checkbox">     
      <label for="option1"><span><span></span></span> </label>
    </td>
    <td>
      <select name="" id="">
          <option value=""> Title </option>
          <option value=""> Ascending </option>
          <option value=""> Descending </option>
        </select>
    </td>
    <td> 
        <select name="" id="">
          <option value=""> Categories </option>
          <option value=""> Banter </option>
          <option value=""> News </option>
        </select>
    </td>
    <td>
      <select name="" id="">
          <option value=""> Date </option>
          <option value=""> October </option>
          <option value=""> September </option>
          <option value=""> August </option>
          <option value=""> July </option>
        </select>
    </td>
    <td> Action </td>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <td>         
          <input name="" type="checkbox">     
          <label for="option1"><span><span></span></span> </label>        
      </td>
      <td class="blogtitle"> 
        <a href="{{url('admin/posts')}}/{{$post->id}}"> {{$post->title}} </a> 
        <ul class="blogoptions">
          <li> <a href="#"> <a href="#"> <i class="icon-eye-open"></i> </a> </a> </li>
          <li> <a href="#"> <a href="#"> <i class="icon-bolt2"></i> </a> </a> </li>        
        </ul>         
      </td>
      <td> @foreach($post->categories as $category)
				{{$category->name}}
			@endforeach 
	  </td>
      <td> {{ date( 'jS F Y', strtotime($post->created_at) ) }} </td>
      <td class="del" style="text-align: center;"> <a href="{{url('admin/posts')}}/{{$post->id}}/delete" style="font-size: 12px;color: #CAC8C8;"><i class="icon-line-cross"></i></a> </td>
    </tr>   
  @endforeach	
  </tbody>
</table>

{!! $posts->render() !!}


<!-- <div class="pagination">
  <ul>
    <li> <a href=""> <i class="icon-double-angle-left"></i></a> </li>
    <li> <a href=""> <i class="icon-angle-left"></i></a> </li>
    <li> <a href="" class="active"> 1 </a> </li>
    <li> <a href=""> 2 </a> </li>
    <li> <a href=""> <i class="icon-angle-right"></i></a> </li>
    <li> <a href=""> <i class="icon-double-angle-right"></i></a> </li>
  </ul>
</div>
 -->

 <script>
  // $(".blogtitle").hover(function(){
  //   $('.blogoptions').css('visibility','visible');
  //   }, function(){
  //       // change to any color that was previously used.
  //       $('.blogoptions').css('visibility','hidden');
  //   });
 </script>

@endsection