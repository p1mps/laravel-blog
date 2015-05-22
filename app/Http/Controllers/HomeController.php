<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::paginate(5);
		return view('home', compact('posts'));
	}

    
    public function login()
    {
        return view('login');
    }

    

    
    public function postLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        
        if (\Auth::attempt(['username' => $username, 'password' => $password]))
        {
            return redirect('/dashboard');
        }
        else
            return redirect('/login')->with('errors',array('username or password not correct'));
            
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
    
}
