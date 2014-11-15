<?php

class AdminStoryController extends BaseController {

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
        return View::make('admin.story.index')->with('stories', $stories);
	}

    public function getView($id) {
    	$story = Story::find($id);
        if ($story == null) return App::abort(404);
        return View::make('story.view')->with('story', $story);
    }

    public function getCreate() {
    	$story = new Story();
        return View::make('admin.story.form')->with('story', $story);
    }

    public function getUpdate($id) {
    	$story = Story::find($id);
        return View::make('admin.story.form')->with('story', $story);
    }

    public function postUpdate($id) {
        $input = Input::all();
        $story = Story::find($id);
        if ($story == null) App::abort(404);
        $story->fill($input);
        $story->save();
        return Redirect::to('/admin/story/index');
    }

    public function getDelete($id) {
        $story = Story::find($id);
        $story->delete();
        return Redirect::to('/admin/story/index');
    }

    public function postCreate() {
        $input = Input::all();
        $story = new Story($input);
        $story->save();
        return Redirect::to('/admin/story/index');
    }
}