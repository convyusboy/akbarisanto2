<?php

class AssetController extends BaseController {

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

	public function getIndex()
	{
		return View::make('about.index');
	}

	public function post_upload(){
		
		$input = Input::all();
		$rules = array(
			'file' => 'image|max:3000',
			);
		
		$validation = Validator::make($input, $rules);
		
		if ($validation->fails())
		{
			return Response::make($validation->errors->first(), 400);
		}
		
		$file = Input::file('file');
		
		$extension = File::extension($file['name']);
		$directory = path('public').'uploads/'.sha1(time());
		$filename = sha1(time().time()).".{$extension}";
		
		$upload_success = Input::upload('file', $directory, $filename);
		
		if( $upload_success ) {
			return Response::json('success', 200);
		} else {
			return Response::json('error', 400);
		}
	}
}