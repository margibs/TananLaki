
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
    <li class="active"> <a href="{{ url('/admin/posts') }}"> <i class="icon-paperclip"></i> All </a> </li>
    <li> <a href="{{ url('/admin/drafts') }}"> <i class="icon-line-marquee"></i> Draft </a> </li>
    <li> <a href="{{ url('/admin/trash') }}"> <i class="icon-trash"></i> Trash </a> </li>                    
    <li> <a class="searchlink"> <i class="icon-line-search"></i> Search </a> </li>
  </ul>

</div>


<table>
  <thead>
    <td> <input type="checkbox"> </td>
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
      <td> <input type="checkbox"> </td>
      <td> <a href="{{url('admin/posts')}}/{{$post->id}}"> {{$post->title}} </a> </td>
      <td> @foreach($post->categories as $category)
				{{$category->name}}
			@endforeach 
	  </td>
      <td> {{ date( 'jS F Y', strtotime($post->created_at) ) }} </td>
      <td> <a href="{{url('admin/posts')}}/{{$post->id}}/delete"><i class="icon-trash2 trash"></i></a> </td>
    </tr>   
  @endforeach	
  </tbody>
</table>

{!! $posts->render() !!}


@endsection