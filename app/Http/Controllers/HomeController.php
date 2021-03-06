<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;
use Intervention\Image\Facades\Image;
use Jenssegers\Agent\Agent;

use App;
use DB;
use Auth;
use Cookie;
use Socialite;
use Validator;
use File;

use App\User;

use App\Model\Categories;
use App\Model\Comments;
use App\Model\Links;
use App\Model\MediaFiles;
use App\Model\Posts;
use App\Model\SiteSettings;
use App\Model\IpPostsViewed;
use App\Model\PostsPoll;
use App\Model\PostsPollAnswer;
use App\Model\PostsPollResult;

use App\CustomQuery;
use App\CommonFunctions;

class HomeController extends Controller {

    private $data = array();

    private $customQuery;
    private $commonFunctions;

    public function __construct(CustomQuery $customQuery,CommonFunctions $commonFunctions)
    {
        $this->customQuery = $customQuery;
        $this->commonFunctions = $commonFunctions;

        $this->data['categories'] = Categories::where('id','!=',6)->where('id','!=',4)->where('id','!=',2)->get();
        
        // $user_ip = Location::get()->ip;

        $this->data['side_bar_posts'] = DB::table('posts')
            ->join('post_categories','post_categories.post_id','=','posts.id')
            ->join('categories','post_categories.category_id','=','categories.id')
            ->where('categories.slug','!=','lol')
            ->where('posts.status',1)
            ->select('posts.slug','posts.feat_image_url','posts.thumb_feature_image','posts.title','categories.slug as cat_slug')
            // ->orderBy('posts.id','DESC')
            ->orderBy(DB::raw('RAND()'))
            ->groupBy('posts.id')
            ->take(5)
            ->get();

            //             ->whereNotIn('posts.id',function($query) use ($user_ip)
            // {
            //     $query->select(DB::raw('posts_id'))
            //           ->from('ip_posts_vieweds')
            //           ->whereRaw("ip = '".$user_ip."'");
            // })
        
        $customQuery->per_page = 16;
    }

    public function index()
    {
        $this->data['current_category_id'] = 0;
        $this->data['query_string'] = '';
        $this->data['posts'] = $this->customQuery->getPosts();

        return view('home.homepage',$this->data);
    }

    public function searchBlog(Request $request)
    {

        $this->data['posts'] = $this->customQuery->getSearchPost($request->get('q'),15);
        return view('home.search',$this->data);
    }

    public function copyscape()
    {
        // $image_url = 'fiu_47094_49425161_p0.png';

        // $rest = substr($image_url, 0,4);

        // echo $rest == 'fiu_' ? 'watermelon' : 'dili need to resized';
        // open an image file
        // $img = Image::make('uploads/'.$image_url);

        // now you are able to resize the instance
        // $img->resize(753, 438);

        // finally we save the image as a new file
        // $img->save('uploads/fiu_'.$image_url);

        //     $post = Posts::with(array('comments'=>function($query){
        //     $query->where('parent',0);
        // }))->find(17);

        // foreach ($post->comments as $comment) {
        //     echo $comment->content.'<br />';
        // }

        $location = Location::get();
        dd($location);
        // echo 'IP: '.$location->ip.'<br />';
        // echo 'ISP: '.$location->isp.'<br />';
        // echo 'Country Name: '.$location->countryName.'<br />';
        // echo 'Country Code: '.$location->countryCode.'<br />';
        
        // $_username = 'nbbulk2014';

        // $_apikey = '0wn4xoctsdnlcnnn';

        // $_apiurl = 'http://www.copyscape.com/api/?';

        // $content = "When in the course of human events, it becomes necessary for one people to dissolve the political bands which have connected them with another, and to assume the Powers of the earth, the separate and equal station to which the Laws of Nature and of Nature's God entitle them, a decent respect to the opinions of mankind requires that they should declare the causes which impel them to the separation.";

        // $apiurl = $_apiurl.'u='.urlencode($_username).'&k='.urlencode($_apikey).'&t='.urlencode($content).'&f=xml';

        // $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=csearch&e='.urlencode('UTF-8').'&x=1&c=5';
        // $apiurl = $_apiurl.'u=nbbulk2014&k=0wn4xoctsdnlcnnn&o=balance&f=html';
        //search by text

        // $curl=curl_init();

        // curl_setopt($curl, CURLOPT_URL, $apiurl);
        // curl_setopt($curl, CURLOPT_TIMEOUT, 60);
        // curl_setopt($curl, CURLOPT_POST,1);
        // curl_setopt($curl, CURLOPT_POSTFIELDS,urlencode($content));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // curl_setopt ($curl, CURLOPT_URL, $apiurl);
        // curl_setopt ($curl, CURLOPT_HEADER, 1);

        // curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
        // curl_setopt($curl, CURLOPT_TIMEOUT,60);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // $response=curl_exec($curl);

        // $sites = simplexml_load_string ($response);


        // if(curl_errno($curl)) //error from the URL
        // {

        //     return 'Curl Error: ' . curl_error($curl);

        // }

        // curl_close($curl);
        
        // $ar = explode("\r\n\r\n", $response, 2);
        // echo 'VALUE: '.$ar[1][59].'<br />';
        // echo 'Total: '.$ar[1][75];
        // echo $ar[1];

        // echo 'Site Count: '.$sites->count;
        // echo '<br>';
        // echo 'Matched words count: '.$sites->allwordsmatched;
        // echo '<br>';
        // echo 'Matched percentage: '.$sites->allpercentmatched;
        // echo '<br>';

        // echo 'Matched Text: '.$sites->alltextmatched;

//             DB::enableQueryLog();
// DB::table('posts')
//             ->join('post_categories','post_categories.post_id','=','posts.id')
//             ->join('categories','post_categories.category_id','=','categories.id')
//             ->where('categories.slug','!=','lol')
//             ->where('posts.status',1)
//             ->whereNotIn('posts.id',function($query)
//             {
//                 $user_ip = Location::get()->ip;
//                 $query->select(DB::raw('posts_id'))
//                       ->from('ip_posts_vieweds')
//                       ->whereRaw("ip = '".$user_ip."'");
//             })
//             ->select('posts.slug','posts.feat_image_url','posts.title','categories.slug as cat_slug')
//             ->orderBy('posts.id','DESC')
//             ->groupBy('posts.id')
//             ->take(4)
//             ->get();

//                 $query = DB::getQueryLog();
//                 $lastQuery = end($query);
//                 print_r($lastQuery);

        // to delete files
        // File::Delete(public_path('uploads/26028_galaxyhotel.jpg'))
    }

    public function category($category)
    {
        $check_slug = Categories::where('slug','=',$category)->first();

        if($check_slug == null)
        {
            App::abort(404);
        }
        $this->data['query_string'] = '';
        $this->data['posts'] = $this->customQuery->getPosts(0,$check_slug->id);
        $this->data['current_category_id'] = $check_slug->id;
        
        if($category == 'lol')
        {
            return view('home.lol',$this->data);
        }
        else
        {
           return view('home.homepage',$this->data); 
        }
        
    }

    public function lolpage()
    {
        return view('home.lolpage',$this->data);
    }

    public function single($category,$slug)
    {
        $agent = new Agent();

        $this->data['is_mobile'] = $agent->isMobile();
        $this->data['category'] = $category;
        $this->data['slug'] = $slug;

        $this->data['post'] = $this->customQuery->getPost($slug,$category);

        if($this->data['post'] == null)
        {
            App::abort(404);
        }

        $this->data['posts_poll'] = PostsPoll::where('posts_id',$this->data['post']->id)->first();
        $this->data['posts_poll_answers2'] = 0;
        $this->data['posts_poll_has_answer'] = 0;

        if($this->data['posts_poll'] != null && $this->data['posts_poll']->poll_enable == 1)
        {
            $user_ip = Location::get()->ip;

            $this->data['posts_poll_answers2'] = 1;
            $this->data['posts_poll_answers'] = PostsPollAnswer::where('posts_poll_id',$this->data['posts_poll']->id)->get();
            $check_user_if_answered = PostsPollResult::where('ip_address',$user_ip)->where('posts_poll_id',$this->data['posts_poll']->id)->first();

            if($check_user_if_answered != null)
            {
                $this->data['posts_poll_results'] = 
                DB::table('posts_poll_results')
                ->rightJoin('posts_poll_answers','posts_poll_answers.id','=','posts_poll_results.posts_poll_answer_id')
                ->where('posts_poll_answers.posts_poll_id',$this->data['posts_poll']->id)
                ->select(DB::raw('posts_poll_answers.poll_answer,COUNT(posts_poll_results.posts_poll_answer_id) as poll_answer_results'))
                ->groupBy('posts_poll_results.posts_poll_answer_id')
                ->orderBy('posts_poll_answers.id')
                ->get();

                $this->data['posts_poll_results_sum'] = 0;

                foreach($this->data['posts_poll_results'] as $posts_poll_result)
                {
                    $this->data['posts_poll_results_sum'] += $posts_poll_result->poll_answer_results;
                }

                $this->data['posts_poll_has_answer'] = 1;
            }

        }

        $this->data['next_post'] = $this->customQuery->getPostNext($this->data['post']->id,$category);

        // $user_ip = Location::get()->ip;
        // IpPostsViewed::firstOrCreate(['ip' => $user_ip,'posts_id' => $this->data['post']->id]);

        // $this->data['links'] = Links::orderBy(DB::raw('RAND()'))->take(6)->get();
        // $this->data['links'] = DB::table('links_countries')
        //     ->join('links','links_countries.links_id','=','links.id')
        //     ->where('links_countries.country_code',$ip_country_code)
        //     ->where('visible','=',1)
        //     ->orderBy(DB::raw('RAND()'))
        //     ->take(6)
        //     ->get();
            
        $this->data['related_posts'] = $this->customQuery->getRelatedPost($this->data['post']->cat_id,$this->data['post']->id,4);

        $this->data['user_avatar'] = '';
        
        if(Auth::check())
        {
           $this->data['user_avatar'] = Auth::user()->avatar; 
        }

        // COMMENTS AND CHILD COMMENT
        // $this->data['comments'] = $this->customQuery->getComments($this->data['post']->id);
        // $this->data['comment_count'] = $this->customQuery->getCommentsCount($this->data['post']->id);

        if($category == 'lol')
        {
           return view('home.lolpage',$this->data);
        }
        else
        {
            return view('home.single',$this->data);  
        }
        
    }

    public function author()
    {
        return view('home.author',$this->data);
    }

    //COMMENT AJAX
    public function ajax_add_comment(Request $request)
    {

            $comment = new Comments;
            $comment->post_id = $request->input('post_id');
            $comment->author_id = Auth::user()->id;
            $comment->content = $request->input('content');
            $comment->parent = $request->input('parent');
            $comment->save();

            $new_parent = 
                DB::table('comments')
                ->join('users','comments.author_id','=','users.id')
                ->where('comments.id','=',$comment->id)
                ->select('comments.created_at','comments.content','comments.id','comments.parent','comments.post_id','comments.author_id','users.avatar','users.name')
                ->get();

            return json_encode($new_parent);    

    }

    public function ajaxSurveyAnswer(Request $request)
    {
        if(Auth::check())
        {
            $user_ip = Location::get()->ip;

            $postsPollResult = new PostsPollResult;
            $postsPollResult->posts_poll_id = $request->input('poll_id');
            $postsPollResult->posts_poll_answer_id = $request->input('poll_answer_id');
            $postsPollResult->ip_address = $user_ip;
            $postsPollResult->save();

            $posts_poll_results = 
            DB::table('posts_poll_results')
            ->rightJoin('posts_poll_answers','posts_poll_answers.id','=','posts_poll_results.posts_poll_answer_id')
            ->where('posts_poll_answers.posts_poll_id',$request->input('poll_id'))
            ->select(DB::raw('posts_poll_answers.poll_answer,COUNT(posts_poll_results.posts_poll_answer_id) as poll_answer_results'))
            ->groupBy('posts_poll_results.posts_poll_answer_id')
            ->orderBy('posts_poll_answers.id')
            ->get();

            return json_encode($posts_poll_results);
        }
    }

    public function ajaxGetPage(Request $request)
    {
        if($request->input('current_category_id') == 0)
        {
            $getPage = $this->customQuery->getPosts($request->input('page'));
        }
        elseif($request->input('query_string') != '')
        {
            $getPage = $this->customQuery->getPosts($request->input('page'),null,$request->input('query_string'));
        }
        else
        {
            $getPage = $this->customQuery->getPosts($request->input('page'),$request->input('current_category_id'));
        }
        

        if(!empty($getPage))
        {
            return json_encode($getPage);
        }

        return 'false';

    }

    //END COMMENT AJAX

    //SOCIAL LOGIN
    public function socialLogin(Request $request,$category = 0 ,$slug = 0)
    {
        if (Auth::check()) return redirect('/');

        if($request->has('code'))
        {

            $user = Socialite::driver('facebook')->user();

            $user_profile = User::where('email','=',$user->email)->first();

            if($user_profile == null)
            {
                $user_profile = User::firstOrCreate(array(
                    'email'    => $user->email,
                    'name'     => $user->name,
                    'avatar'   => $user->avatar,
                    'status'   => 2
                ));
            }

            $user_profile->avatar = $user->avatar;
            $user_profile->save();

            Auth::login($user_profile, true);

            if($request->cookie('redirect_url') != "0/0")
            {
                return redirect($request->cookie('redirect_url'));
            }

            return redirect('/');

        }
        else
        {
            $url = $category.'/'.$slug;
            Cookie::queue(Cookie::make('redirect_url', $url, 10));
            return Socialite::driver('facebook')->redirect(); 
        }

    }
    public function autoLogin(Request $request) 
    {
        if(Auth::check())
        {
            return 'false';
        }
        else
        {
            $user_profile = User::where('email','=',$request->input('email'))->first();
            Auth::login($user_profile, true);

            return 'true';
        }

    }
    //END SOCIAL LOGIN


}
