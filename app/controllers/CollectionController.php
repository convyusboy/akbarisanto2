<?php

class CollectionController extends BaseController {

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
        $collections = Collection::all();
        return View::make('admin.collection.index')->with('collections', $collections);
    }

	public function getIndex2()
	{
        $collections = Collection::all();
        return View::make('admin.collection.index2')->with('collections', $collections);
    }

    public function getView($id) {
    	$collection = Collection::find($id);
        if ($collection == null) return App::abort(404);
        return View::make('collection.view')->with('collection', $collection);
    }

    public function getCreate() {
    	$collection = new Collection();
        return View::make('admin.collection.form')->with('collection', $collection);
    }

    public function getUpdate($id) {
    	$collection = Collection::find($id);
        return View::make('admin.collection.form')->with('collection', $collection);
    }

    public function postUpdate($id) {
        $input = Input::all();
        $collection = Collection::find($id);
        if ($collection == null) App::abort(404);
        $collection->fill($input);
        $collection->save();
        return Redirect::to('/admin/collection/index');
    }

    public function getDelete($id) {
        $collection = Collection::find($id);
        $collection->delete();
        return Redirect::to('/admin/collection/index');
    }

    public function postCreate() {
        // $input = Input::all();

        $filename = Input::get('name');
        $file = Input::get('file'); // your file upload input field in the form should be named 'file'

        $destinationPath = 'uploads/collection';
        // $filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
         
        if( $uploadSuccess ) {
           return Response::json('success', 200); // or do a redirect with some message that file was uploaded
        } else {
           return Response::json('error', 400);
        }

        // $collection = new Collection($input);
        // $collection->save();
        return Redirect::to('/admin/collection/index');
   }
}