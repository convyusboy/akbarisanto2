<?php

class PostController extends BaseController {

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
        $works = Work::all();
        return View::make('work.index')->with('works', $works);
	}

	public function postPhoto($id) {
		$id_user = Auth::user()->id;
		$file = Input::file("file"); // your file upload input field in the form should be named 'file'
		$destinationPath = 'assets/photo/restaurant';
		$extension =$file->getClientOriginalExtension(); //if you need extension of the file
		$photo = RestaurantPhoto::create(array('id_restaurant' => $id, 'id_user' => $id_user, 'caption' => Input::get('caption')));
		$uploadSuccess = Input::file('file')->move($destinationPath, $photo['id'].'.jpg');
		if ($uploadSuccess) {
			$restaurantInfo = Restaurant::where('id', '=', $id)->get()[0];
			ActivityLog::create(array("id_user" => $id_user, "id_restaurant" => $id, "name" => $restaurantInfo["name"], "activity_type" => "photo", "content" => json_encode(array("id" => $photo['id'], "caption" => Input::get('caption')))));
		}	
		return Redirect::to('restaurant/'.$id);
	}


}