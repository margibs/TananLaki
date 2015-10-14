<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Str;

use App;
use DB;
use Auth;
use Session;
use Validator;
use File;

use Facebook\Facebook;
use Thujohn\Twitter\Facades\Twitter;
use Intervention\Image\Facades\Image;

use App\User;

use App\Model\Categories;
use App\Model\Links;
use App\Model\MediaFiles;
use App\Model\PostCategories;
use App\Model\Posts;
use App\Model\SiteSettings;
use App\Model\Comments;
use App\Model\LinksCountry;
use App\Model\PostsPoll;
use App\Model\PostsPollAnswer;
use App\Model\PostsPollResult;


use App\CustomQuery;
use App\CommonFunctions;

class AdminController extends Controller
{   
    private $customQuery;

    public function __construct(CustomQuery $customQuery)
    {
        $this->customQuery = $customQuery;
    }
	public function index()
	{
		return 'ADMIN HOMEPAGE!';
	}

    public function adminSettings()
    {
        return view('admin.adminSettings');
    }

	public function users()
	{
		$data['users'] = User::all();

        return view('admin.users',$data);
	}
    
    //POSTS
	public function posts()
	{
        $data['post_name'] = 'Posts';
		$data['posts'] = Posts::where('status','=',1)->orderBy('created_at','DESC')->paginate(15);
        //Loop post to get its categories
		foreach ($data['posts'] as $post)
        {
            $post->categories = $this->customQuery->getPostCategories($post->id,true);
		}

		return view('admin.posts',$data);
	}

    public function drafts()
    {        
        $data['post_name'] = 'Drafts';
        $data['posts'] = Posts::where('status','=',0)->orderBy('id','DESC')->paginate(15);
        //Loop post to get its categories
        foreach ($data['posts'] as $post) 
        {
            $post->categories = $this->customQuery->getPostCategories($post->id,true);
        }

        return view('admin.posts',$data);
    }

    public function trash()
    {
    	$data['post_name'] = 'Trash';
        $data['posts'] = Posts::where('status','=',3)->orderBy('id','DESC')->paginate(15);
        //Loop post to get its categories
        foreach ($data['posts'] as $post) 
        {
            $post->categories = $this->customQuery->getPostCategories($post->id,true);
        }

        return view('admin.posts',$data);
    }

    public function newPost()
    {
        $_apiurl = 'http://www.copyscape.com/api/?';
        $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=balance&f=html';
        $curl=curl_init();
        curl_setopt ($curl, CURLOPT_URL, $apiurl);
        curl_setopt ($curl, CURLOPT_HEADER, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_TIMEOUT,60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($curl);
        curl_close($curl);
        $ar = explode("\r\n\r\n", $response, 2);

        $data['copyscape_balance'] = $ar[1];

        $data['categories'] = Categories::all();
        return view('admin.newPost',$data);
    }

    public function lolPost()
    {
        $_apiurl = 'http://www.copyscape.com/api/?';
        $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=balance&f=html';
        $curl=curl_init();
        curl_setopt ($curl, CURLOPT_URL, $apiurl);
        curl_setopt ($curl, CURLOPT_HEADER, 1);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($curl, CURLOPT_TIMEOUT,60);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($curl);
        curl_close($curl);
        $ar = explode("\r\n\r\n", $response, 2);

        $data['copyscape_balance'] = $ar[1];

        $data['categories'] = Categories::all();
        return view('admin.lolPost',$data);
    }

    public function editPost($id)
    {
        $data['post'] = Posts::find($id);
        $data['shared_fb_status'] = false;
        $data['shared_twitter_status'] = false;
        $data['poll_enable'] = false;
        $data['posts_answer2'] = 0;
        $data['posts_answer'] = 0;

        $data['posts_poll'] = PostsPoll::where('posts_id',$id)->first();

        if($data['posts_poll'] != null && $data['posts_poll']->poll_enable == 1)
        {
           $data['poll_enable'] = true;
        }

        if($data['posts_poll'] != null)
        {
           $data['posts_answer2'] = 1;
           $data['posts_answer'] = PostsPollAnswer::where('posts_poll_id',$data['posts_poll']->id)->get();
        }

        if($data['post']->shared_fb == 1)
        {
            $data['shared_fb_status'] = true;
        }

        if($data['post']->shared_twitter == 1)
        {
            $data['shared_twitter_status'] = true;
        }

        $data['categories'] = $this->customQuery->getSelectedPostCategories($id);
        
        return view('admin.editPost',$data);
    }

    public function deletePost($id)
    {
        $post = Posts::find($id);
        $post->status = 3;
        $post->save();

        return redirect('admin/posts');
    }

	public function addPost(Request $request,$id = 0)
	{
        // dd($request->all());

        $redirect = 'admin/new_post';  

        //check if new post or edit post
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/posts/'.$id;
        }

        $validate_rules = [];
        if($request->input('poll_enable') == 0)
        {
            $validate_rules = [
            'title' => 'required',
            'content' => 'required',
            'feat_image_url' => 'required',
            'introduction' => 'required',
            'category_id' => 'required'
            ];
        }
        else
        {
            $validate_rules = [
                'title' => 'required',
                'content' => 'required',
                'feat_image_url' => 'required',
                'introduction' => 'required',
                'category_id' => 'required',
                'pollquestion' => 'required'
            ];
        }
        //Validate input
		$validator = Validator::make($request->all(), $validate_rules );

    	if ($validator->fails()) 
        {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        //check if new post or edit post
        if($id != 0)
        {
            $post = Posts::find($id);

            if($post->status == 0 AND $request->input('status') == 1)
            {
                $post->created_at = date('Y-m-d H:i:s');
            }

        }
        else
        {
            $post = new Posts;
            $post->slug = $this->getPostSlug($request->input('title'));
            $post->author_id = Auth::user()->id;
        }
        

        $post->excerpt = $request->input('excerpt');
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->introduction = $request->input('introduction');

        $post->status = 0;
        $post_fb_now = false;
        $post_twitter_now = false;

        if($request->input('status') != null)
        {
            $post->status = $request->input('status');

            if($request->input('shared_fb') == 1)
            {
                if($post->shared_fb == 0 || $post->shared_fb == null)
                {
                    $post->shared_fb = 1;
                    $post_fb_now = true;
                }
            }

            if($request->input('shared_twitter') == 1)
            {
                if($post->shared_twitter == 0 || $post->shared_twitter == null)
                {
                    $post->shared_twitter = 1;
                    $post_twitter_now = true;
                }
            }
        }
		
        if($request->input('feat_image_url') != '')
        {
            // $post->feat_image_url = $request->input('feat_image_url'); 
            $feat_image_url =  $request->input('feat_image_url');
            $check_fiu = substr($feat_image_url, 0,4);

            if($check_fiu != 'fiu_')
            {
                // open an image file
                $img = Image::make('uploads/'.$feat_image_url);
                $img2 = Image::make('uploads/'.$feat_image_url);

                // now you are able to resize the instance
                // $img->resize(753, 438);
                // add callback functionality to retain maximal original image size
                $img->fit(753, 438, function ($constraint) {
                    $constraint->upsize();
                });

                $img2->fit(402, 224, function ($constraint) {
                    $constraint->upsize();
                });

                // finally we save the image as a new file
                $img->save('uploads/fiu_'.$feat_image_url);
                $img2->save('uploads/tmb_'.$feat_image_url);

                $post->feat_image_url = 'fiu_'.$feat_image_url;
                $post->thumb_feature_image = 'tmb_'.$feat_image_url;
            }
            else
            {
                $post->feat_image_url = $feat_image_url;

                if($post->thumb_feature_image == '')
                {
                    $old_feat_image_url = substr($feat_image_url, 4);
                    $img2 = Image::make('uploads/'.$old_feat_image_url);
                    $img2->fit(402, 224, function ($constraint) {
                        $constraint->upsize();
                    });
                    $img2->save('uploads/tmb_'.$old_feat_image_url);
                    $post->thumb_feature_image = 'tmb_'.$old_feat_image_url;
                }
            }
        }

        if($request->input('widget_image_url') != '')
        {
            $post->yt_image = $request->input('widget_image_url');  
        }

		$post->save();

        if( $request->input('poll_enable') != 0 )
        {
            $posts_poll = 
            PostsPoll::firstOrCreate(
                [
                    'posts_id' => $post->id,
                ]
            );

            $posts_poll->poll_question = $request->input('pollquestion');
            $posts_poll->poll_enable = $request->input('poll_enable');
            $posts_poll->poll_question =  $request->input('pollquestion');
            $posts_poll->save();

            PostsPollAnswer::where('posts_poll_id',$posts_poll->id)->delete();

            if( count( $request->input('poll_choice') ) != 0 )
            {
                $data2 = array();

                for ($i=0; $i < count($request->input('poll_choice')) ; $i++) 
                {
                    if( $request->input('poll_choice')[$i] != '')
                    {
                        $data2[] = array('posts_poll_id' => $posts_poll->id,'poll_answer' => $request->input('poll_choice')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
                    }

                }

                PostsPollAnswer::insert($data2);
            }

        }
        else
        {
            $posts_poll2 = PostsPoll::where('posts_id',$post->id)->first();

            if($posts_poll2 != null)
            {
                $posts_poll2->poll_enable = $request->input('poll_enable');
                $posts_poll2->save();
            }
        }

        PostCategories::where('post_id','=',$post->id)->delete();

        if( count( $request->input('category_id') ) != 0 )
        {
            $data = array();

            for ($i=0; $i < count($request->input('category_id')) ; $i++) 
            {
                $data[] = array('post_id' => $post->id,'category_id' => $request->input('category_id')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));

                if($request->input('category_id')[$i] == 7 )
                {
                    $post_fb_now = false;
                    $post_twitter_now = false;
                }
            }

            PostCategories::insert($data);
        }
        else
        {
            // For Uncategorized category
            $postCategories = new PostCategories;
            $postCategories->post_id = $post->id;
            $postCategories->category_id = 6;
            $postCategories->save();
        }

        $get_category = $this->customQuery->getPostCategories($post->id,false);
        $blog_url = "http://alllad.com/".$get_category->slug.'/'.$post->slug;

        if($post_fb_now)
        {
            $linkData = [
                "message" => $post->title,
                "link" => $blog_url,
                "picture" => 'http://alllad.com/uploads/'.$post->feat_image_url,
                "name" => $post->title,
                "caption" => "alllad.com",
                "description" => $post->excerpt
            ];
            $this->shared_fb($linkData);
        }

        if($post_twitter_now)
        {
            $shorten_url = $this->google_shorten($blog_url);

            $twitter_message = $post->title.' '.$shorten_url;

            if(strlen($post->title) > 90)
            {
                $twitter_message = substr($post->title,0,90).'... '.$shorten_url;
            }

            $twitter_file = 'uploads/'.$post->feat_image_url;

            $uploaded_media = Twitter::uploadMedia(['media' => File::get(public_path($twitter_file))]);
            Twitter::postTweet(['status' => $twitter_message, 'media_ids' => $uploaded_media->media_id_string]);
        }

        return redirect('admin/posts');
	}
    //END POSTS

    public function widgets()
    {
        return view('admin.widgets');
    }

    //CATEGORIES
	public function categories()
	{
		$data['categories'] = Categories::all();
		return view('admin.categories',$data);
	}

	public function addCategory(Request $request)
	{
		$messages = [
		    'name.required' => 'Category name is required',
		    'name.unique' => 'Category name is not available',
		    'name.max' => 'Category name may not be greater than 200 characters.',
		];

		$validator = Validator::make($request->all(), [
            'name' => 'required|unique:categories|max:200'
        ],$messages);

    	if ($validator->fails()) {
            return redirect('admin/categories')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = new Categories;
        $category->name = $request->input('name');
        $category->slug = $this->getCategorySlug($request->input('name'));
        $category->save();

        return  redirect('admin/categories');
	}
    //END CATEGORIES

    //LINKS
    public function links()
    {
        $data['links'] = Links::all();
        return view('admin.links',$data);
    }

    public function newLink()
    {
        return view('admin.newLink');
    }

    public function editLink($id)
    {
        $link = Links::find($id);
        $country_codes = [];
        $countries = LinksCountry::where('links_id',$link->id)->get(['country_code']);

        foreach ($countries as $country) {
            $country_codes[] = $country->country_code;
        }

        return view('admin.editLink',compact('link','country_codes'));
    }

    public function addLink(Request $request,$id = 0)
    {
        // dd($request->all());
        $redirect = 'admin/new_link';  

        //check if new post or edit post
        //get redirect
        if($id != 0)
        {
            $redirect = 'admin/edit_link/'.$id;
        }

        $validator = Validator::make($request->all(), [
            'url' => 'required',
            'image' => 'required',
            'website_url' => 'required',
            'countries' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect($redirect)
                        ->withErrors($validator)
                        ->withInput();
        }

        //check if new post or edit post
        if($id != 0)
        {
            $link = Links::find($id);
        }
        else
        {
            $link = new Links;
        }

        $link->url = $request->input('url');
        $link->image = $request->input('image');
        $link->description = $request->input('description');
        $link->website_url = $request->input('website_url');
        $link->visible = $request->input('visible');
        $link->save();

        LinksCountry::where('links_id','=',$link->id)->delete();
        if( count( $request->input('countries') ) != 0 )
        {
            $data = array();

            for ($i=0; $i < count($request->input('countries')) ; $i++) 
            { 
                $data[] = array('links_id' => $link->id,'country_code' => $request->input('countries')[$i],'created_at' => date('Y-m-d H:i:s'), 'updated_at'=> date('Y-m-d H:i:s'));
            }

            LinksCountry::insert($data);
        }

        return redirect('admin/links');

    }
    //END LINKS

    public function mediaGallery()
    {
        $media_files = MediaFiles::orderBy('id','DESC')->paginate(20);
        return view('admin.mediaGallery',compact('media_files'));
    }
	public function mediaFiles()
	{
        $data['media_files'] = MediaFiles::orderBy('id','DESC')->take(30)->get();
		return view('admin.media_file',$data);
	}

    public function media_file_upload(Request $request)
    {

        // getting all of the post data
        $file = array('file' => $request->file('file'),'item_label' => $request->input('item_label'));
        // setting up rules
        //$rules = array('file' => 'required','file' => 'mimes:jpeg,png,bmp'); //mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('file' => 'required|mimes:jpeg,png,bmp,gif,GIF,PNG,JPEG,JPG','item_label' => 'required'); 
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) 
        {
            // return $validator->messages();
            return Redirect::back()->withErrors($validator->messages());
        }
        else 
        {

            // checking file is valid.
            $originalName = $request->file('file')->getClientOriginalName();

            if ($request->file('file')->isValid()) 
            {
              $destinationPath = 'uploads'; // upload path
              // $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
              //$originalName = Input::file('file')->getClientOriginalName();
              $fileName = rand(11111,99999).'_'.strtolower($originalName); // renameing image
              $fileSize = $request->file('file')->getSize();

              $request->file('file')->move($destinationPath, $fileName); // uploading file to given path
              // sending back with message
              Session::flash('success', 'Upload successfully'); 

              $file['file_name'] = strtolower($fileName); 
              $file['file_size'] = $fileSize / 1024;


              $meadiFiles = new MediaFiles;
              $meadiFiles->image_url = $file['file_name'];
              $meadiFiles->user_id = Auth::user()->id;
              $meadiFiles->title = $request->input('item_label');
              $meadiFiles->save();

              return redirect('admin/media_file');
            }
            else 
            {
              // return 'not successfully uploaded: '.$request->file('file')->getErrorMessage();
                return Redirect::back()->withErrors(['error', 'file not valid']);
            }
        }
    
    }

	public function comments()
	{

		$comments =
				DB::table('comments')
				->join('users','comments.author_id','=','users.id')
                ->leftJoin('posts','comments.post_id','=','posts.id')
                ->join('post_categories','posts.id','=','post_categories.post_id')
                ->join('categories','post_categories.category_id','=','categories.id')
                ->select('users.name','comments.content','comments.created_at','comments.approved','posts.slug','posts.id','categories.slug as catslug')
				->paginate(15);

        // dd($comments);

		return view('admin.comments',compact('comments'));
	}

    //AJAX
    public function ajaxGetMediaFile()
    {
        return json_encode(MediaFiles::orderBy('id','DESC')->take(30)->get());
    }

    public function ajaxDeleteImage(Request $request)
    {
        $mediaFile = MediaFiles::find($request->input('image_id'));
        $image_url = $mediaFile->image_url;
        $mediaFile->delete();
        File::Delete(public_path('uploads/'.$image_url));
        
        return 'image delete';
    }
    public function ajaxUploadImage(Request $request)
    {
        // getting all of the post data
        $file = array('file' => $request->file('myfile'));
        // setting up rules
        //$rules = array('file' => 'required','file' => 'mimes:jpeg,png,bmp'); //mimes:jpeg,bmp,png and for max size max:10000
        $rules = array('file' => 'required|mimes:jpeg,png,bmp,gif,GIF,PNG,JPEG,JPG'); 
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);

        if ($validator->fails()) 
        {
            // return $validator->messages();
            return Redirect::back()->withErrors($validator->messages());
        }
        else 
        {

            // checking file is valid.
            $originalName = $request->file('myfile')->getClientOriginalName();

            if ($request->file('myfile')->isValid()) 
            {
              $destinationPath = 'uploads'; // upload path
              // $extension = Input::file('file')->getClientOriginalExtension(); // getting image extension
              //$originalName = Input::file('file')->getClientOriginalName();
              $fileName = rand(11111,99999).'_'.strtolower($originalName); // renameing image
              $fileSize = $request->file('myfile')->getSize();

              $request->file('myfile')->move($destinationPath, $fileName); // uploading file to given path

              $file['file_name'] = strtolower($fileName); 
              $file['file_size'] = $fileSize / 1024;


              $mediaFile = new MediaFiles;
              $mediaFile->image_url = $file['file_name'];
              $mediaFile->user_id = Auth::user()->id;
              $mediaFile->title = strtolower($originalName);
              $mediaFile->save();

              return json_encode(MediaFiles::find($mediaFile->id));
            }
            else 
            {
              // return 'not successfully uploaded: '.$request->file('file')->getErrorMessage();
             // return Redirect::back()->withErrors(['error', 'file not valid']);
            }
        }

    }
    //END AJAX

    //COMMON FUNCTIONS
    public function shared_fb($linkData)
    {
        
        $config = array();
        $config['app_id'] = '907091149365288';
        $config['app_secret'] = 'b6b39fef2d5b628efbaed0b40b0c055e';
        // $config['fileUpload'] = false; // optional
         
        $fb = new Facebook($config);

        try {
          // Returns a `Facebook\FacebookResponse` object
          //716294001804336 new alllad
          $response = $fb->post('/716294001804336/feed', $linkData, 'CAAM4ZCp28oCgBANzKJR8dwpeJd2yy7oZBhZBqvNqBx5tmuOTlC8z8I4B1r5PP8lRcRyXkrVBMEoAsdDZCZBkzMo1PJl15jRyDeml0xZBwXZAdCZBSvyQSzhZCWuIstdql9Cd9zJe05yuusbTqn44fdhpimtYryZCavV7aecsPZBLCxrvH7o1t9Kce7X');
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          echo 'Graph returned an error: ' . $e->getMessage();
          exitg;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          echo 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }
    }

    public function google_shorten($url)
    {
        // Get API key from : http://code.google.com/apis/console/
        $apiKey = 'AIzaSyACvNKMmB7-WpRRL_bRSXLm7YSCAM4CmB4';

        $postData = array('longUrl' => $url);
        $jsonData = json_encode($postData);

        $curlObj = curl_init();

        curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
        curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curlObj, CURLOPT_HEADER, 0);
        curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
        curl_setopt($curlObj, CURLOPT_POST, 1);
        curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($curlObj);
        // Change the response json string to object
        $json = json_decode($response);

        curl_close($curlObj);

        return $json->id;
    }
    //END COMMON FUNCTIONS
    //SLUGS

	public function getCategorySlug($value, $slug_check = false)
    {
        if (!$slug_check)
        {
            $slug = Str::slug($value);
        }
        else
        {
            $slug = $value;
        }
        

        if($slug == 'new')
        {
            $slug = 'new_0';
        }
   
        $slugCount = (Categories::where('slug','like',$slug.'%')->count()); 

        if ($slugCount >0)
        {
            $slugCount ++;
            return  $slug.'-'.($slugCount);
        }
        else
        {
            return $slug;
        }

    }

    public function getPostSlug($value, $slug_check = false)
    {
        if (!$slug_check)
        {
            $slug = Str::slug($value);
        }
        else
        {
            $slug = $value;
        }
        

        if($slug == 'new')
        {
            $slug = 'new_0';
        }
   
        $slugCount = (Posts::where('slug','like',$slug.'%')->count()); 

        if ($slugCount >0)
        {
            $slugCount ++;
            return  $slug.'-'.($slugCount);
        }
        else
        {
            return $slug;
        }
    }

    public function ajaxCheckContent(Request $request)
    {
        $_username = 'nbbulk2014';

        $_apikey = '0wn4xoctsdnlcnnn';

        $_apiurl = 'http://www.copyscape.com/api/?';

        $content = $request->input('content');

        $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=csearch&e='.urlencode('UTF-8').'&c=5';

        //search by text

        $curl=curl_init();

        curl_setopt($curl, CURLOPT_URL, $apiurl);
        curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        curl_setopt($curl, CURLOPT_POST,1);
        curl_setopt($curl, CURLOPT_POSTFIELDS,urlencode($content));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response=curl_exec($curl);

        $sites = simplexml_load_string ($response);

        curl_close($curl);

        return json_encode($sites);
    }
}
