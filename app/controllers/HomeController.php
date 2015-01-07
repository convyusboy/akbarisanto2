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
		// $consumer_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		// $secret_key = 'mo6hLpAaVElUmeXPcwuhQfo00rtgObLuNNJkewy0BmRAq7yACS';
		// for portfolio
		$portfolios = array();
		$api_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		$tag = 'portfolio';
		$url = 'api.tumblr.com/v2/blog/akbarisanto.tumblr.com/posts?api_key='.$api_key.'&tag='.$tag;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$posts_res = curl_exec($curl);
		curl_close($curl);
		$posts_resj = json_decode($posts_res,true);
		$posts = $posts_resj['response']['posts'];

		foreach ($posts as $post) {
			$portfolio = [
			'id' => $post['id'],
			'title' => $post['slug'],
			'content' => $post['slug'],
			'link' => $post['post_url']
			];
			array_push($portfolios, $portfolio);
		}

		// $portfolios = Post::where('category_id','=','1')->get();
		$blogs = Post::where('category_id','=','2')->get();
		return View::make('index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

	public function getDevMenu()
	{
		// $consumer_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		// $secret_key = 'mo6hLpAaVElUmeXPcwuhQfo00rtgObLuNNJkewy0BmRAq7yACS';
		// for portfolio
		$portfolios = array();
		$api_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		$tag = 'portfolio';
		$url = 'api.tumblr.com/v2/blog/akbarisanto.tumblr.com/posts?api_key='.$api_key.'&tag='.$tag;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$posts_res = curl_exec($curl);
		curl_close($curl);
		$posts_resj = json_decode($posts_res,true);
		$posts = $posts_resj['response']['posts'];

		foreach ($posts as $post) {
			$portfolio = [
			'id' => $post['id'],
			'title' => $post['slug'],
			'content' => $post['slug'],
			'link' => $post['post_url']
			];
			array_push($portfolios, $portfolio);
		}

		// $portfolios = Post::where('category_id','=','1')->get();
		$blogs = Post::where('category_id','=','2')->get();
		return View::make('dev/menu/index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

	public function postMail()
	{
		$input = Input::all();

		$name = $input['name'];
		$email_address = $input['email'];
		$phone = $input['phone'];
		$message = $input['message'];

		$body = "You have received a new message from your website contact form.<br>"."Here are the details:<br>Name: $name<br>Email: $email_address<br>Phone: $phone<br>Message:<br>$message";
		$headers = "From: noreply@akbarisanto.com<br>"; 
		$headers .= "Reply-To: $email_address";	
		$data = array('body' => $body, 'headers' => $headers);

		Mail::send('emails.welcome', $data, function($message)
		{
			$message->to('ridho.akbarisanto@yahoo.com')
			->from('ridho@akbarisanto.com')
			->subject('Website Contact Form');
		});

		return Redirect::to('/');

	}

}