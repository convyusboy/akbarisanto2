<?php

class StoryController extends BaseController {

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
        $stories = Story::all();
        return View::make('story.index')->with('stories', $stories);
	}

    public function getView($id) {
    	$story = Story::find($id);
        if ($story == null) return App::abort(404);
        return View::make('story.view')->with('story', $story);
    }

}