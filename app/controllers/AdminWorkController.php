<?php

class AdminWorkController extends BaseController {

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
        return View::make('admin.work.index')->with('works', $works);
	}
    public function getView($id) {
    	$work = Work::find($id);
        if ($work == null) return App::abort(404);
        return View::make('work.view')->with('work', $work);
    }

    public function getCreate() {
    	$work = new Work();
        return View::make('admin.work.form')->with('work', $work);
    }

    public function getUpdate($id) {
    	$work = Work::find($id);
        return View::make('admin.work.form')->with('work', $work);
    }

    public function postUpdate($id) {
        $input = Input::all();
        $work = Work::find($id);
        if ($work == null) App::abort(404);
        $work->fill($input);
        $work->save();
        return Redirect::to('/admin/work/index');
    }

    public function getDelete($id) {
        $work = Work::find($id);
        $work->delete();
        return Redirect::to('/admin/work/index');
    }

    public function postCreate() {
        $input = Input::all();
        $work = new Work($input);
        $work->save();
        return Redirect::to('/admin/work/index');
    }
}