<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller {

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $posts = Post::paginate(10);
		return view('posts.list', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('posts.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        $input = $request->only('name','address','email','text');

        $v = $this->validatePost($input); 
        
        if ($v->fails())
        {
            return redirect()->back()->with('errors', $v->errors()->all());
        }

        Post::create($input);

        return redirect()->back()->with('info',['post created']);
        
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $post = Post::find($id);
		return view('posts.edit', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $post = Post::find($id);
        return view('posts.form', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $input = $request->only('name','address','email','text');
        
        $v = $this->validatePost($input);
        
        if ($v->fails())
        {
            return redirect()->back()->with('errors', $v->errors()->all());
        }

        $post = Post::find($id);
        $post->name = $input['name'];
        $post->email = $input['email'];
        $post->address = $input['address'];
        $post->text = $input['text'];
        $post->save();
        return redirect()->back()->with('info',['post updated']);
    }

    /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
		$post = Post::find($request->get('id'));
        $post->delete();
        return redirect()->back()->with('info',['post deleted']);
    }

    private function validatePost($input)
    {
        $v = \Validator::make($input, [
            'name' => 'required|max:20',
            'email' => 'required|email',
            'address' => 'required|max:20',
            'text' => 'required|max:600'
        ]);
        
        return $v;
    }
}
