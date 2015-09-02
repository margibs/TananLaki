<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Model\Categories;
use App\Model\Posts;
use DB;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/admin';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getRegister()
    {
        $data['categories'] = Categories::all();

        $data['side_bar_posts'] = Posts::orderBy('id','DESC')->take(5)->get();

        foreach ($data['side_bar_posts'] as $post) {
            $post->categories2 = 
            DB::table('post_categories')
            ->join('categories','post_categories.category_id','=','categories.id')
            ->where('post_categories.post_id','=',$post->id)
            ->first();
        }

        return view('auth.register',$data);
    }

    public function getLogin()
    {

        $data['categories'] = Categories::all();

        $data['side_bar_posts'] = Posts::orderBy('id','DESC')->take(5)->get();

        foreach ($data['side_bar_posts'] as $post) {
            $post->categories2 = 
            DB::table('post_categories')
            ->join('categories','post_categories.category_id','=','categories.id')
            ->where('post_categories.post_id','=',$post->id)
            ->first();
        }

        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('auth.login',$data);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
