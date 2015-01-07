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
		$portfolios = $this->getTumblrPost('portfolio');
		$blogs = $this->getTumblrPost('blog');

		return View::make('index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

	public function getDevMenu()
	{
		$portfolios = $this->getTumblrPost('portfolio');
		$blogs = $this->getTumblrPost('blog');

		return View::make('dev/menu/index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

	public function getDevOri()
	{
		$portfolios = $this->getTumblrPost('portfolio');
		$blogs = $this->getTumblrPost('blog');

		return View::make('dev/ori/index')->with('blogs',$blogs)->with('portfolios',$portfolios);
	}

	public function postMail()
	{
		$input = Input::all();

		// // Check for empty fields
		// if(empty($input['name'])  		||
		// 	empty($input['email']) 		||
		// 	empty($input['phone']) 		||
		// 	empty($input['message'])	||
		// 	!filter_var($input['email'],FILTER_VALIDATE_EMAIL))
		// {
		// 	echo "No arguments Provided!";
		// 	return false;
		// }

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

		// return true;
	}

	public function getTumblrPost($tag) {
		// $consumer_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		// $secret_key = 'mo6hLpAaVElUmeXPcwuhQfo00rtgObLuNNJkewy0BmRAq7yACS';
		$api_key = 'Etkk7hgob55TMDhK6f6dZuQkJoJ8HL5uj4kqwrPvmWJ8lof5v8';
		$url = 'api.tumblr.com/v2/blog/akbarisanto.tumblr.com/posts?api_key='.$api_key.'&tag='.$tag;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$posts_res = curl_exec($curl);
		curl_close($curl);
		$posts_resj = json_decode($posts_res,true);
		$posts = $posts_resj['response']['posts'];

		for($i = 0; $i < count($posts); $i ++) {
			if (!array_key_exists('title', $posts[$i]))
				$posts[$i]['title'] = $posts[$i]['slug'];
			if (array_key_exists('body', $posts[$i]))
				$posts[$i]['content'] = $posts[$i]['body'];
			else if (array_key_exists('description', $posts[$i]))
				$posts[$i]['content'] = $posts[$i]['description'];
			else
				$posts[$i]['content'] = $posts[$i]['slug'];
		}

		return $posts;
	}


}