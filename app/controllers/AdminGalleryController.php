<?php

class AdminGalleryController extends BaseController {

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
        $galleries = Gallery::all();
        return View::make('admin.gallery.index')->with('galleries', $galleries);
    }

	public function getIndex2()
	{
        $galleries = Gallery::all();
        return View::make('admin.gallery.index2')->with('galleries', $galleries);
    }

    public function getView($id) {
    	$gallery = Gallery::find($id);
        if ($gallery == null) return App::abort(404);
        return View::make('gallery.view')->with('gallery', $gallery);
    }

    public function getCreate() {
    	$gallery = new Gallery();
        return View::make('admin.gallery.form')->with('gallery', $gallery);
    }

    public function getUpdate($id) {
    	$gallery = Gallery::find($id);
        return View::make('admin.gallery.form')->with('gallery', $gallery);
    }

    public function postUpdate($id) {
        $input = Input::all();
        $gallery = Gallery::find($id);
        if ($gallery == null) App::abort(404);
        $gallery->fill($input);
        $gallery->save();
        return Redirect::to('/admin/gallery/index');
    }

    public function getDelete($id) {
        $gallery = Gallery::find($id);
        $gallery->delete();
        return Redirect::to('/admin/gallery/index');
    }

    public function postCreate() {
        // $input = Input::all();

        $filename = Input::get('name');
        $file = Input::get('file'); // your file upload input field in the form should be named 'file'

        $destinationPath = 'uploads/gallery';
        // $filename = $file->getClientOriginalName();
        //$extension =$file->getClientOriginalExtension(); //if you need extension of the file
        $uploadSuccess = Input::file('file')->move($destinationPath, $filename);
         
        if( $uploadSuccess ) {
           return Response::json('success', 200); // or do a redirect with some message that file was uploaded
        } else {
           return Response::json('error', 400);
        }

        // $gallery = new Gallery($input);
        // $gallery->save();
        return Redirect::to('/admin/gallery/index');
   }
}