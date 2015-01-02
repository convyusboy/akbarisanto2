<?php

class PhotoController extends BaseController {

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
        $photos = Photo::all();
        return View::make('admin.photo.index')->with('photos', $photos);
    }

    public function getView($id) {
    	$photo = Photo::find($id);
        if ($photo == null) return App::abort(404);
        return View::make('photo.view')->with('photo', $photo);
    }

    public function getCreate() {
    	$photo = new Photo();
        return View::make('admin.photo.form')->with('photo', $photo);
    }

    public function getUpdate($id) {
    	$photo = Photo::find($id);
        return View::make('admin.photo.form')->with('photo', $photo);
    }

    public function postUpdate($id) {
        $file = Input::file("file"); // your file upload input field in the form should be named 'file'
        $destinationPath = 'assets/photo';
        // $extension =$file->getClientOriginalExtension(); //if you need extension of the file
        // $photo = Photo::create(array('post_id' => $post_id, 'title' => Input::get('title'), 'desc' => Input::get('desc')));
        $input = Input::only('post_id','title','desc');
        // $photo = Photo::create(array('post_id' => $post_id, 'title' => Input::get('title'), 'desc' => Input::get('desc')));
        $photo = Photo::find($id);
        $photo->fill($input);
        $photo->save();
        $uploadSuccess = $file->move($destinationPath, $photo['id'].'.jpg');
        if ($uploadSuccess) {

        }   
        return Redirect::to('/admin/photo/index');
    }

    public function getDelete($id) {
        $photo = Photo::find($id);
        $photo->delete();
        return Redirect::to('/admin/photo/index');
    }

    public function postCreate() {
        $file = Input::file("file"); // your file upload input field in the form should be named 'file'
        $destinationPath = 'assets/photo';
        // $extension =$file->getClientOriginalExtension(); //if you need extension of the file
        // $photo = Photo::create(array('post_id' => $post_id, 'title' => Input::get('title'), 'desc' => Input::get('desc')));
        $input = Input::only('post_id','title','desc');
        // $photo = Photo::create(array('post_id' => $post_id, 'title' => Input::get('title'), 'desc' => Input::get('desc')));
        $photo = new Photo($input);
        $photo->save();
        $uploadSuccess = $file->move($destinationPath, $photo['id'].'.jpg');
        if ($uploadSuccess) {

        }   
        return Redirect::to('/admin/photo/index');
    }
}