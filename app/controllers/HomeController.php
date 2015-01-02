<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getHome()
	{
		// Authenticate via API Key
		// $client = new Tumblr\API\Client('Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8');

// Make the request
		// $client->getBlogPosts('akbarisanto.tumblr.com');
		
		$portfolios = Post::where('category_id','=','1')->get();
		$blogs = Post::where('category_id','=','2')->get();
		return View::make('index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

}