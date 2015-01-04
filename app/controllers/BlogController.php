<?php

class BlogController extends BaseController {

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
        $blogs = Post::where('category_id','=','2')->get();
        return View::make('admin.blog.index')->with('blogs', $blogs);
	}

    public function getView($id) {
    	$blog = Post::find($id);
        if ($blog == null) return App::abort(404);
        return View::make('blog.view')->with('blog', $blog);
    }

    public function getCreate() {
    	$blog = new Post();
        return View::make('admin.blog.form')->with('blog', $blog);
    }

    public function getUpdate($id) {
    	$blog = Post::find($id);
        return View::make('admin.blog.form')->with('blog', $blog);
    }

    public function blogUpdate($id) {
        $input = Input::all();
        $blog = Post::find($id);
        if ($blog == null) App::abort(404);
        $blog->fill($input);
        $blog->save();
        return Redirect::to('/admin/blog/index');
    }

    public function getDelete($id) {
        $blog = Post::find($id);
        $blog->delete();
        return Redirect::to('/admin/blog/index');
    }

    public function blogCreate() {
        $input = Input::all();
        $blog = new Post($input);
        $blog->save();
        return Redirect::to('/admin/blog/index');
    }
}