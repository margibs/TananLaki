<?php 

namespace App;

use DB;
use App\Model\Comments;

class CustomQuery {

	public $per_page;

	/**
     * @param Int $post_id
     * @param Bool $is_multiple
     */
	public function getPostCategories($post_id,$is_multiple)
	{
		if($is_multiple)
		{
			return DB::table('post_categories')
				->join('categories','post_categories.category_id','=','categories.id')
				->where('post_categories.post_id','=',$post_id)
				->select('categories.name','categories.slug')
				->get();
		}

		return DB::table('post_categories')
			->join('categories','post_categories.category_id','=','categories.id')
			->where('post_categories.post_id','=',$post_id)
			->select('categories.name','categories.slug')
			->first();
	}

	/**
     * @param Int $id
     */
	public function getSelectedPostCategories($id)
	{
		//DONE
		return DB::table('post_categories')
			->rightJoin('categories', 'post_categories.category_id','=', 
			DB::raw('categories.id AND post_categories.post_id = ' . $id))
			->select('categories.id','categories.name','post_categories.post_id')
			->get();
	}

	/**
     * @param Int $paginate
     * @param Bool $with_category
     */
	public function getPosts($page = 0,$id = null,$q = '')
	{
		$query = DB::table('posts')
				->join('users','users.id','=','posts.author_id')
		        ->join('post_categories','posts.id','=','post_categories.post_id')
		        ->join('categories','categories.id','=','post_categories.category_id')
		        ->select('users.name as user_name','users.id as user_id','posts.slug','posts.introduction','posts.content','posts.feat_image_url','posts.thumb_feature_image','posts.title','posts.created_at','posts.excerpt','categories.name','categories.slug as cat_slug')
		        ->where('posts.status','=',1)
		        ->where('categories.id','!=',2)
		        ->where('posts.id','!=',516);

		if($id != null)
		{
			//Done optimized
			return 
				$query->where('post_categories.category_id','=',$id)
		        ->orderBy('posts.created_at','DESC')
		        ->take($this->per_page)
		        ->offset($page*$this->per_page)
		        ->get();
		}
		// For Review

		if($q == '')
		{
			return 
				$query->where('categories.id','!=',7)
				->take($this->per_page)
		        ->offset($page*$this->per_page)
		        ->orderBy('posts.created_at','DESC')
		        ->groupBy('posts.id')
		        ->get();
		}

		return 
			$query->where('categories.id','!=',7)
			->where('posts.title', 'LIKE', '%'.$q.'%')
	        ->orderBy('posts.created_at','DESC')
	        ->groupBy('posts.id')
	        ->take($this->per_page)
	        ->offset($page*$this->per_page)
	        ->get();
	}

	public function getSearchPost($q = '',$page)
	{
		return 
			DB::table('posts')
	        ->join('post_categories','posts.id','=','post_categories.post_id')
	        ->join('categories','categories.id','=','post_categories.category_id')
	        ->where('posts.status','=',1)
	        ->where('posts.slug', 'LIKE', '%'.$q.'%')
	        ->select('posts.slug','posts.feat_image_url','posts.title','posts.created_at','posts.excerpt','categories.name','categories.slug as cat_slug')
	        ->orderBy('posts.id','DESC')
	        ->groupBy('posts.id')
	        ->paginate($page);	
	}

	// SINGLE POST

	public function getPost($slug,$category_slug)
	{
		//DONE
		return 
			DB::table('posts')
			->join('users','posts.author_id','=','users.id')
			->join('post_categories','posts.id','=','post_categories.post_id')
			->join('categories','categories.id','=','post_categories.category_id')
			->where('posts.slug','=',$slug)
			->where('posts.status','=',1)
			->where('categories.slug','=',$category_slug)
			->select('posts.introduction','posts.id','posts.title','posts.created_at','posts.feat_image_url','posts.content','posts.author_id','users.name','users.avatar','users.description','categories.name as cat_name','categories.slug as cat_slug','categories.id as cat_id')
			->first();
	}

	public function getPostNext($post_id,$category_slug)
	{
		//DONE
		return 
			DB::table('posts')
			->join('post_categories','posts.id','=','post_categories.post_id')
			->join('categories','categories.id','=','post_categories.category_id')
			->where('posts.id','<',$post_id)
			->where('posts.status','=',1)
			->where('categories.slug','=',$category_slug)
			->select('posts.slug','posts.title','categories.slug as cat_slug')
			->orderBy('posts.id','DESC')
			->first();
	}

	public function getRelatedPost($category_id,$post_id,$take = 4)
	{
		return
			DB::table('posts')
			->join('post_categories','post_categories.post_id','=','posts.id')
			->join('categories','post_categories.category_id','=','categories.id')
			->where('post_categories.category_id','=',$category_id)
			->where('posts.id','!=',$post_id)
			->where('posts.status','=',1)
			->select('posts.feat_image_url','posts.title','posts.content','posts.slug','categories.slug as cat_slug')
			// ->orderBy(DB::raw('RAND()'))
			->orderBy('posts.id','DESC')
			->take($take)
			->get();
	}

	//COMMENTS QUERY FOR REVIEW
	public function getComments($post_id)
	{
		$comments =
			DB::table('comments')                
			->join('users','comments.author_id','=','users.id')
			->where('comments.post_id','=',$post_id)
			->where('comments.parent','=',0)
			->select('comments.content','comments.id','comments.parent','comments.post_id','comments.author_id','comments.created_at','users.avatar','users.name')
			->orderBy('comments.id','ASC')
			->get();

        foreach ($comments as $comment) 
        {
			$comment->child_comments =
				DB::table('comments')
				->join('users','comments.author_id','=','users.id')
				->where('comments.parent','=',$comment->id)
				->select('comments.content','comments.id','comments.parent','comments.post_id','comments.author_id','comments.created_at','users.avatar','users.name')
				->get();
        }

        return $comments;
	}
	public function getCommentsCount($post_id)
	{
		return Comments::where('post_id','=',$post_id)->count();
	}
}
